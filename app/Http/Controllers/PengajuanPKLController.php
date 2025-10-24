<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPKL;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanPKLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $pengajuanPKLs = PengajuanPKL::where('mahasiswa_id', $mahasiswa->id)->with(['perusahaan', 'validator'])->get();

        return view('pengajuan_pkl.index', compact('pengajuanPKLs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaans = Perusahaan::all();
        return view('pengajuan_pkl.create', compact('perusahaans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaans,id',
            'description' => 'nullable|string',
        ]);

        $mahasiswa = Auth::user()->mahasiswa;

        PengajuanPKL::create([
            'mahasiswa_id' => $mahasiswa->id,
            'perusahaan_id' => $request->perusahaan_id,
            'description' => $request->description,
        ]);

        return redirect()->route('pengajuan-pkl.index')->with('success', 'Pengajuan PKL berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanPKL $pengajuanPKL)
    {
        $this->authorize('view', $pengajuanPKL);
        return view('pengajuan_pkl.show', compact('pengajuanPKL'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanPKL $pengajuanPKL)
    {
        $this->authorize('update', $pengajuanPKL);
        $perusahaans = Perusahaan::all();
        return view('pengajuan_pkl.edit', compact('pengajuanPKL', 'perusahaans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengajuanPKL $pengajuanPKL)
    {
        $this->authorize('update', $pengajuanPKL);

        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaans,id',
            'description' => 'nullable|string',
        ]);

        $pengajuanPKL->update($request->only(['perusahaan_id', 'description']));

        return redirect()->route('pengajuan-pkl.index')->with('success', 'Pengajuan PKL berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanPKL $pengajuanPKL)
    {
        $this->authorize('delete', $pengajuanPKL);
        $pengajuanPKL->delete();

        return redirect()->route('pengajuan-pkl.index')->with('success', 'Pengajuan PKL berhasil dihapus.');
    }
}
