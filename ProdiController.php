<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();
        return view('prodi.index', compact('prodis'));
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('prodi_photos', 'public');
            $data['photo'] = $photoPath;
        }

        Prodi::create($data);

        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil ditambahkan.');
    }

    public function show(Prodi $prodi)
    {
        return view('prodi.show', compact('prodi'));
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', compact('prodi'));
    }

    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($prodi->photo && Storage::disk('public')->exists($prodi->photo)) {
                Storage::disk('public')->delete($prodi->photo);
            }

            $photoPath = $request->file('photo')->store('prodi_photos', 'public');
            $data['photo'] = $photoPath;
        }

        $prodi->update($data);

        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil diperbarui.');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();

        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil dihapus.');
    }
}
