<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->get('role', 'mahasiswa'); // Default role mahasiswa
        $userId = $request->get('user_id'); // ID user berdasarkan role

        if ($role === 'mahasiswa' && !$userId) {
            return redirect()->route('dashmhs')->with('error', 'User ID diperlukan untuk mengakses jadwal bimbingan mahasiswa.');
        }

        if ($role === 'mahasiswa' && $userId) {
            $bimbingans = Bimbingan::where('mahasiswa_id', $userId)->get();
        } elseif ($role === 'dosen' && $userId) {
            $bimbingans = Bimbingan::where('dosen_id', $userId)->get();
        } elseif (in_array($role, ['kaprodi', 'admin'])) {
            $bimbingans = Bimbingan::all();
        } else {
            $bimbingans = collect(); // Empty collection jika role tidak valid
        }

        return view('bimbingan.index', compact('bimbingans', 'role', 'userId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $role = 'mahasiswa'; // Always treat as mahasiswa for create
        $userId = $request->get('user_id');

        if (!$userId) {
            return redirect()->route('dashmhs')->with('error', 'User ID diperlukan untuk menambah jadwal bimbingan.');
        }

        $mahasiswa = Mahasiswa::find($userId);
        if (!$mahasiswa) {
            return redirect()->route('bimbingan.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Mahasiswa tidak ditemukan.');
        }
        $dosens = Dosen::where('prodi_id', $mahasiswa->prodi_id)->get();
        $perusahaans = Perusahaan::all();

        return view('bimbingan.create', compact('mahasiswa', 'dosens', 'perusahaans', 'role', 'userId'));
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
            'perusahaan_id' => 'required|exists:perusahaans,id',
        ]);

        Bimbingan::create($request->all());

        $role = $request->get('role');
        $userId = $request->get('user_id');

        return redirect()->route('bimbingan.index', ['role' => $role, 'user_id' => $userId])->with('success', 'Jadwal bimbingan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $bimbingan = Bimbingan::findOrFail($id);
        $role = $request->get('role');
        $userId = $request->get('user_id');

        return view('bimbingan.show', compact('bimbingan', 'role', 'userId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $bimbingan = Bimbingan::findOrFail($id);
        $role = $request->get('role');
        $userId = $request->get('user_id');

        if ($role !== 'dosen') {
            return redirect()->route('bimbingan.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Hanya dosen yang bisa memvalidasi jadwal bimbingan.');
        }

        return view('bimbingan.edit', compact('bimbingan', 'role', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bimbingan = Bimbingan::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $bimbingan->update($request->only('status'));

        $role = $request->get('role');
        $userId = $request->get('user_id');

        return redirect()->route('bimbingan.index', ['role' => $role, 'user_id' => $userId])->with('success', 'Status jadwal bimbingan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $bimbingan = Bimbingan::findOrFail($id);
        $role = $request->get('role');
        $userId = $request->get('user_id');

        if ($role !== 'mahasiswa' || $bimbingan->mahasiswa_id != $userId) {
            return redirect()->route('bimbingan.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Hanya mahasiswa yang membuat jadwal yang bisa menghapusnya.');
        }

        $bimbingan->delete();

        return redirect()->route('bimbingan.index', ['role' => $role, 'user_id' => $userId])->with('success', 'Jadwal bimbingan berhasil dihapus.');
    }
}
