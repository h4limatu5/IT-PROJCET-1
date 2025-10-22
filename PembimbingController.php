<?php

namespace App\Http\Controllers;

use App\Models\Pembimbing;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembimbingController extends Controller
{
    public function index()
    {
        $pembimbings = Pembimbing::with('prodi')->get();
        return view('pembimbing.index', compact('pembimbings'));
    }

    public function indexForRole($role, $userId)
    {
        $pembimbings = Pembimbing::with('prodi')->get();
        return view('pembimbing.index', compact('pembimbings', 'role', 'userId'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('pembimbing.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pembimbings,email',
            'nip' => 'required|string|max:20|unique:pembimbings,nip',
            'prodi_id' => 'required|exists:prodis,id',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Pembimbing::create($data);

        return redirect()->route('pembimbing.index')->with('success', 'Pembimbing berhasil ditambahkan.');
    }

    public function show(Pembimbing $pembimbing)
    {
        $pembimbing->load('prodi', 'bimbingans', 'seminars', 'nilais');
        return view('pembimbing.show', compact('pembimbing'));
    }

    public function edit(Pembimbing $pembimbing)
    {
        $prodis = Prodi::all();
        return view('pembimbing.edit', compact('pembimbing', 'prodis'));
    }

    public function update(Request $request, Pembimbing $pembimbing)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pembimbings,email,' . $pembimbing->id,
            'nip' => 'required|string|max:20|unique:pembimbings,nip,' . $pembimbing->id,
            'prodi_id' => 'required|exists:prodis,id',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($pembimbing->photo) {
                Storage::disk('public')->delete($pembimbing->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $pembimbing->update($data);

        return redirect()->route('pembimbing.index')->with('success', 'Pembimbing berhasil diperbarui.');
    }

    public function destroy(Pembimbing $pembimbing)
    {
        if ($pembimbing->photo) {
            Storage::disk('public')->delete($pembimbing->photo);
        }

        $pembimbing->delete();

        return redirect()->route('pembimbing.index')->with('success', 'Pembimbing berhasil dihapus.');
    }

    public function profile(Pembimbing $pembimbing)
    {
        return view('pembimbing.profile', compact('pembimbing'));
    }

    public function updateProfile(Request $request, Pembimbing $pembimbing)
    {
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['phone']);

        if ($request->hasFile('photo')) {
            if ($pembimbing->photo) {
                Storage::disk('public')->delete($pembimbing->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $pembimbing->update($data);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
