<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::with('prodi')->get();
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('dosen.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email',
            'nip' => 'required|string|max:20|unique:dosens,nip',
            'prodi_id' => 'required|exists:prodis,id',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Dosen::create($data);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function show(Dosen $dosen)
    {
        $dosen->load('prodi', 'bimbingans', 'seminars', 'nilais');
        return view('dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        $prodis = Prodi::all();
        return view('dosen.edit', compact('dosen', 'prodis'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'nip' => 'required|string|max:20|unique:dosens,nip,' . $dosen->id,
            'prodi_id' => 'required|exists:prodis,id',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($dosen->photo) {
                Storage::disk('public')->delete($dosen->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $dosen->update($data);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        if ($dosen->photo) {
            Storage::disk('public')->delete($dosen->photo);
        }

        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }

    public function profile(Dosen $dosen)
    {
        return view('dosen.profile', compact('dosen'));
    }

    public function updateProfile(Request $request, Dosen $dosen)
    {
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['phone']);

        if ($request->hasFile('photo')) {
            if ($dosen->photo) {
                Storage::disk('public')->delete($dosen->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $dosen->update($data);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
