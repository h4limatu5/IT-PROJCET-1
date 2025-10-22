<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->get('role', 'mahasiswa');
        $userId = $request->get('user_id');

        if ($role === 'mahasiswa' && $userId) {
            $nilais = Nilai::where('mahasiswa_id', $userId)->get();
        } elseif ($role === 'dosen' && $userId) {
            $nilais = Nilai::where('dosen_id', $userId)->get();
        } elseif ($role === 'perusahaan' && $userId) {
            $nilais = Nilai::where('perusahaan_id', $userId)->get();
        } elseif ($role === 'kaprodi' || $role === 'admin') {
            $nilais = Nilai::all();
        } else {
            $nilais = collect();
        }

        return view('nilai.index', compact('nilais', 'role', 'userId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $role = $request->get('role');
        $userId = $request->get('user_id');

        if ($role === 'dosen') {
            $mahasiswas = Mahasiswa::whereHas('bimbingans', function($query) use ($userId) {
                $query->where('dosen_id', $userId);
            })->get();
        } elseif ($role === 'perusahaan') {
            $mahasiswas = Mahasiswa::where('perusahaan_id', $userId)->get();
        } elseif ($role === 'kaprodi' || $role === 'admin') {
            $mahasiswas = Mahasiswa::all();
        } else {
            $mahasiswas = collect();
        }

        $dosens = Dosen::all();
        $perusahaans = Perusahaan::all();

        return view('nilai.create', compact('mahasiswas', 'dosens', 'perusahaans', 'role', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'dosen_id' => 'nullable|exists:dosens,id',
            'perusahaan_id' => 'nullable|exists:perusahaans,id',
            'nilai_dosen' => 'nullable|numeric|min:0|max:100',
            'nilai_perusahaan' => 'nullable|numeric|min:0|max:100',
            'komentar_dosen' => 'nullable|string',
            'komentar_perusahaan' => 'nullable|string',
        ]);

        // Calculate nilai_akhir if both scores are provided
        $nilaiAkhir = null;
        if ($request->nilai_dosen && $request->nilai_perusahaan) {
            $nilaiAkhir = ($request->nilai_dosen + $request->nilai_perusahaan) / 2;
        }

        Nilai::create(array_merge($request->all(), ['nilai_akhir' => $nilaiAkhir, 'status' => 'submitted']));

        $role = $request->get('role');
        $userId = $request->get('user_id');

        return redirect()->route('nilai.index', ['role' => $role, 'user_id' => $userId])->with('success', 'Nilai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $nilai = Nilai::findOrFail($id);
        $role = $request->get('role');
        $userId = $request->get('user_id');

        return view('nilai.show', compact('nilai', 'role', 'userId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $nilai = Nilai::findOrFail($id);
        $role = $request->get('role');
        $userId = $request->get('user_id');

        // Check permissions
        if ($role === 'dosen' && $nilai->dosen_id != $userId) {
            return redirect()->route('nilai.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Anda tidak memiliki akses untuk mengedit nilai ini.');
        }
        if ($role === 'perusahaan' && $nilai->perusahaan_id != $userId) {
            return redirect()->route('nilai.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Anda tidak memiliki akses untuk mengedit nilai ini.');
        }

        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        $perusahaans = Perusahaan::all();

        return view('nilai.edit', compact('nilai', 'mahasiswas', 'dosens', 'perusahaans', 'role', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nilai = Nilai::findOrFail($id);
        $role = $request->get('role');
        $userId = $request->get('user_id');

        // Check permissions
        if ($role === 'dosen' && $nilai->dosen_id != $userId) {
            return redirect()->route('nilai.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Anda tidak memiliki akses untuk mengedit nilai ini.');
        }
        if ($role === 'perusahaan' && $nilai->perusahaan_id != $userId) {
            return redirect()->route('nilai.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Anda tidak memiliki akses untuk mengedit nilai ini.');
        }

        if ($role === 'kaprodi' || $role === 'admin') {
            $request->validate([
                'nilai_dosen' => 'nullable|numeric|min:0|max:100',
                'nilai_perusahaan' => 'nullable|numeric|min:0|max:100',
                'komentar_dosen' => 'nullable|string',
                'komentar_perusahaan' => 'nullable|string',
                'status' => 'required|in:draft,submitted,approved',
            ]);
        } else {
            $request->validate([
                'nilai_dosen' => 'nullable|numeric|min:0|max:100',
                'nilai_perusahaan' => 'nullable|numeric|min:0|max:100',
                'komentar_dosen' => 'nullable|string',
                'komentar_perusahaan' => 'nullable|string',
            ]);
        }

        // Calculate nilai_akhir if both scores are provided
        $nilaiAkhir = null;
        if ($request->nilai_dosen && $request->nilai_perusahaan) {
            $nilaiAkhir = ($request->nilai_dosen + $request->nilai_perusahaan) / 2;
        }

        if ($role === 'kaprodi' || $role === 'admin') {
            $nilai->update(array_merge($request->only(['nilai_dosen', 'nilai_perusahaan', 'komentar_dosen', 'komentar_perusahaan', 'status']), ['nilai_akhir' => $nilaiAkhir]));
        } else {
            $nilai->update(array_merge($request->only(['nilai_dosen', 'nilai_perusahaan', 'komentar_dosen', 'komentar_perusahaan']), ['nilai_akhir' => $nilaiAkhir]));
        }

        return redirect()->route('nilai.index', ['role' => $role, 'user_id' => $userId])->with('success', 'Nilai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $nilai = Nilai::findOrFail($id);
        $role = $request->get('role');
        $userId = $request->get('user_id');

        // Only allow deletion by admin or kaprodi
        if (!in_array($role, ['admin', 'kaprodi'])) {
            return redirect()->route('nilai.index', ['role' => $role, 'user_id' => $userId])->with('error', 'Anda tidak memiliki akses untuk menghapus nilai.');
        }

        $nilai->delete();

        return redirect()->route('nilai.index', ['role' => $role, 'user_id' => $userId])->with('success', 'Nilai berhasil dihapus.');
    }
}
