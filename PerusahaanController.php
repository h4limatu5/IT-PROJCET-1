<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    public function index()
    {
        $mitras = Perusahaan::with('prodis')->get();
        return view('perusahaan.index', compact('mitras'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('perusahaan.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'provinsi' => 'nullable|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|unique:perusahaans,email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'prodi_ids' => 'array',
            'prodi_ids.*' => 'exists:prodis,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $perusahaan = Perusahaan::create($data);

        if ($request->has('prodi_ids')) {
            $perusahaan->prodis()->attach($request->prodi_ids);
        }

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    public function show(Perusahaan $perusahaan)
    {
        $perusahaan->load('prodis');
        return view('perusahaan.show', compact('perusahaan'));
    }

    public function edit(Perusahaan $perusahaan)
    {
        $perusahaan->load('prodis');
        $prodis = Prodi::all();
        return view('perusahaan.edit', compact('perusahaan', 'prodis'));
    }

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'provinsi' => 'nullable|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|unique:perusahaans,email,' . $perusahaan->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'prodi_ids' => 'array',
            'prodi_ids.*' => 'exists:prodis,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($perusahaan->logo) {
                Storage::disk('public')->delete($perusahaan->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        } else {
            // Remove logo from data to avoid setting it to null
            unset($data['logo']);
        }

        $perusahaan->update($data);

        if ($request->has('prodi_ids')) {
            $perusahaan->prodis()->sync($request->prodi_ids);
        } else {
            $perusahaan->prodis()->detach();
        }

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil diperbarui.');
    }

    public function destroy(Perusahaan $perusahaan)
    {
        // Delete logo file if exists
        if ($perusahaan->logo) {
            Storage::disk('public')->delete($perusahaan->logo);
        }

        $perusahaan->prodis()->detach();
        $perusahaan->delete();

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil dihapus.');
    }
}
