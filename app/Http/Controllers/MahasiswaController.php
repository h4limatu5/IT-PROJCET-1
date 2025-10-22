<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateMahasiswaProfileRequest;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('mahasiswa.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim',
            'prodi_id' => 'required|exists:prodis,id',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('prodi', 'bimbingans', 'seminars', 'nilais', 'dokumens');
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswa->id,
            'prodi_id' => 'required|exists:prodis,id',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($mahasiswa->photo && Storage::disk('public')->exists($mahasiswa->photo)) {
                Storage::disk('public')->delete($mahasiswa->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->photo && Storage::disk('public')->exists($mahasiswa->photo)) {
            Storage::disk('public')->delete($mahasiswa->photo);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    public function profile(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.profile', compact('mahasiswa'));
    }

    public function updateProfile(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['phone']);

        if ($request->hasFile('photo')) {
            if ($mahasiswa->photo && Storage::disk('public')->exists($mahasiswa->photo)) {
                Storage::disk('public')->delete($mahasiswa->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $mahasiswa->update($data);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function bulkCreate()
    {
        $prodis = Prodi::all();
        return view('mahasiswa.bulk_create', compact('prodis'));
    }

    public function bulkStore(Request $request)
    {
        $request->validate([
            'mahasiswas' => 'required|string',
        ]);

        $mahasiswasData = json_decode($request->mahasiswas, true);

        if (!$mahasiswasData || !is_array($mahasiswasData)) {
            return redirect()->back()->withErrors(['mahasiswas' => 'Format data tidak valid. Harus berupa JSON array.']);
        }

        $errors = [];
        $successCount = 0;

        foreach ($mahasiswasData as $index => $data) {
            try {
                $validator = Validator::make($data, [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:mahasiswas,email',
                    'nim' => 'required|string|max:20|unique:mahasiswas,nim',
                    'prodi_id' => 'required|exists:prodis,id',
                    'phone' => 'nullable|string|max:20',
                ]);

                if ($validator->fails()) {
                    $errors[] = "Mahasiswa " . ($index + 1) . ": " . implode(', ', $validator->errors()->all());
                    continue;
                }

                Mahasiswa::create($data);
                $successCount++;

            } catch (\Exception $e) {
                $errors[] = "Mahasiswa " . ($index + 1) . ": " . $e->getMessage();
            }
        }

        $message = $successCount . " mahasiswa berhasil ditambahkan.";
        if (!empty($errors)) {
            $message .= " Error pada: " . implode('; ', $errors);
        }

        return redirect()->route('mahasiswa.index')->with('success', $message);
    }
}
