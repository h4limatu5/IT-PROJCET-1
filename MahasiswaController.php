<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
   public function __construct()
{
    $this->middleware('auth');
}


    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->paginate(10);
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim',
            'email' => 'required|email|max:255|unique:mahasiswas,email',
            'phone' => 'required|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'program_studi' => 'required|string|max:100',
        ]);
        if ($request->hasFile('profile_photo')) {
            $validated['foto'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswas.index')->with('success', 'Profil mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => ['required', 'string', 'max:20', Rule::unique('mahasiswas')->ignore($mahasiswa->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('mahasiswas')->ignore($mahasiswa->id)],
            'phone' => 'required|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'program_studi' => 'required|string|max:100',
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($mahasiswa->foto) {
                Storage::delete('public/' . $mahasiswa->foto);
            }
            $validated['foto'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswas.show', $mahasiswa)->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->foto) {
            Storage::delete('public/' . $mahasiswa->foto);
        }

        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Profil mahasiswa berhasil dihapus!');
    }
}
