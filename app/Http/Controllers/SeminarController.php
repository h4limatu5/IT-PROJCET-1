<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->get('role', 'mahasiswa'); // Default role mahasiswa, bisa diubah via parameter
        $userId = $request->get('user_id'); // ID user berdasarkan role

        if ($role === 'mahasiswa' && !$userId) {
            return redirect()->route('dashmhs')->with('error', 'User ID diperlukan untuk mengakses jadwal seminar mahasiswa.');
        }

        if ($role === 'mahasiswa' && $userId) {
            $seminars = Seminar::where('mahasiswa_id', $userId)->get();
        } elseif ($role === 'dosen' && $userId) {
            $seminars = Seminar::where('dosen_id', $userId)->get();
        } elseif (in_array($role, ['kaprodi', 'admin'])) {
            $seminars = Seminar::all();
        } else {
            $seminars = collect(); // Empty collection jika role tidak valid
        }

        return view('seminar.index', compact('seminars', 'role', 'userId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $role = 'mahasiswa'; // Always treat as mahasiswa for create
        $userId = $request->get('user_id');

        if (!$userId) {
            return redirect()->route('dashmhs')->with('error', 'User ID diperlukan untuk menambah jadwal seminar.');
        }

        $mahasiswa = Mahasiswa::find($userId);
        if (!$mahasiswa) {
            return redirect()->route('seminar.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Mahasiswa tidak ditemukan.');
        }
        $dosens = Dosen::where('prodi_id', $mahasiswa->prodi_id)->get();
        $prodis = Prodi::all();

        return view('seminar.create', compact('mahasiswa', 'dosens', 'prodis', 'role', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['dosen_id' => $request->dosen_id ?: null]);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'dosen_id' => 'nullable|exists:dosens,id',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        Seminar::create($request->all());

        $role = $request->get('role');
        $userId = $request->get('user_id');

        return redirect()->route('seminar.index', ['role' => $role, 'user_id' => $userId])->with('success', 'Jadwal seminar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $seminar = Seminar::findOrFail($id);
        $role = $request->get('role');
        $userId = $request->get('user_id');

        return view('seminar.show', compact('seminar', 'role', 'userId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $seminar = Seminar::findOrFail($id);
        $role = $request->get('role');
        $userId = $request->get('user_id');

        if ($role !== 'dosen') {
            return redirect()->route('seminar.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Hanya dosen yang bisa memvalidasi jadwal seminar.');
        }

        return view('seminar.edit', compact('seminar', 'role', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seminar = Seminar::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $seminar->update($request->only('status'));

        $role = $request->get('role');
        $userId = $request->get('user_id');

        return redirect()->route('seminar.index', ['role' => $role, 'user_id' => $userId])->with('success', 'Status jadwal seminar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $seminar = Seminar::findOrFail($id);
        $role = $request->get('role');
        $userId = $request->get('user_id');

        if ($role !== 'mahasiswa' || $seminar->mahasiswa_id != $userId) {
            return redirect()->route('seminar.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Hanya mahasiswa yang membuat jadwal yang bisa menghapusnya.');
        }

        $seminar->delete();

        return redirect()->route('seminar.index', ['role' => $role, 'user_id' => $userId])->with('success', 'Jadwal seminar berhasil dihapus.');
    }
}
