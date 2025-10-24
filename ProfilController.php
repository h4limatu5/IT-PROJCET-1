<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        // Nonaktifkan login
        // $this->middleware('auth');

        $user = Auth::user();

        if ($user && $user->mahasiswa) {
            $mahasiswa = $user->mahasiswa;
        } else {
            // Mode demo tanpa login
            $mahasiswa = (object)[
                'id' => 1,
                'nama' => 'Syifa Kania Ardita',
                'program_studi' => 'Teknik Informatika',
                'nim' => 'A11.2025.0001',
                'email' => 'syifa@politala.ac.id',
                'no_hp' => '081234567890',
                'foto' => null
            ];
        }

        // KIRIM KE BLADE
        return view('profil.index', compact('mahasiswa'));
    }

    public function edit()
    {
        $user = Auth::user();

        if ($user && $user->mahasiswa) {
            $mahasiswa = $user->mahasiswa;
        } else {
            // Mode demo tanpa login
            $mahasiswa = (object)[
                'id' => 1,
                'nama' => 'Syifa Kania Ardita',
                'program_studi' => 'Teknik Informatika',
                'nim' => 'A11.2025.0001',
                'email' => 'syifa@politala.ac.id',
                'no_hp' => '081234567890',
                'foto' => null
            ];
        }

        return view('profil.edit', compact('mahasiswa'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'program_studi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated = $request->only(['nama', 'nim', 'email', 'no_hp', 'program_studi']);

        $user = Auth::user();

        if ($user && $user->mahasiswa) {
            $mahasiswa = $user->mahasiswa;
        } else {
            // Mode demo: buat atau update record demo (asumsi id=1)
            $mahasiswa = Mahasiswa::find(1) ?? new Mahasiswa();
            if (!$mahasiswa->exists) {
                $mahasiswa->id = 1;
            }
        }

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($mahasiswa->foto && Storage::disk('public')->exists('profile_photos/' . $mahasiswa->foto)) {
                Storage::disk('public')->delete('profile_photos/' . $mahasiswa->foto);
            }

            // Upload foto baru
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('profile_photos', $fileName, 'public');
            $mahasiswa->foto = $fileName;
        }

        // Update data
        $mahasiswa->name = $validated['nama'];
        $mahasiswa->nim = $validated['nim'];
        $mahasiswa->email = $validated['email'];
        $mahasiswa->phone = $validated['no_hp'];
        $mahasiswa->program_studi = $validated['program_studi'];

        // Always save the mahasiswa record
        $mahasiswa->save();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }

    public function cv()
    {
        $user = Auth::user();

        if ($user && $user->mahasiswa) {
            $mahasiswa = $user->mahasiswa;
        } else {
            // Mode demo tanpa login
            $mahasiswa = (object)[
                'id' => 1,
                'name' => 'Syifa Kania Ardita',
                'program_studi' => 'Teknik Informatika',
                'nim' => 'A11.2025.0001',
                'email' => 'syifa@politala.ac.id',
                'phone' => '081234567890',
                'foto' => null
            ];
        }

        return view('cv', compact('mahasiswa'));
    }

    public function transkrip()
    {
        $user = Auth::user();

        if ($user && $user->mahasiswa) {
            $mahasiswa = $user->mahasiswa;
        } else {
            // Mode demo tanpa login
            $mahasiswa = (object)[
                'id' => 1,
                'name' => 'Syifa Kania Ardita',
                'program_studi' => 'Teknik Informatika',
                'nim' => 'A11.2025.0001',
                'email' => 'syifa@politala.ac.id',
                'phone' => '081234567890',
                'foto' => null
            ];
        }

        return view('transkripterakhir', compact('mahasiswa'));
    }

    public function surat()
    {
        $user = Auth::user();

        if ($user && $user->mahasiswa) {
            $mahasiswa = $user->mahasiswa;
        } else {
            // Mode demo tanpa login
            $mahasiswa = (object)[
                'id' => 1,
                'name' => 'Syifa Kania Ardita',
                'program_studi' => 'Teknik Informatika',
                'nim' => 'A11.2025.0001',
                'email' => 'syifa@politala.ac.id',
                'phone' => '081234567890',
                'foto' => null
            ];
        }

        return view('suratpermohonanpkl', compact('mahasiswa'));
    }

    public function proposal()
    {
        $user = Auth::user();

        if ($user && $user->mahasiswa) {
            $mahasiswa = $user->mahasiswa;
        } else {
            // Mode demo tanpa login
            $mahasiswa = (object)[
                'id' => 1,
                'name' => 'Syifa Kania Ardita',
                'program_studi' => 'Teknik Informatika',
                'nim' => 'A11.2025.0001',
                'email' => 'syifa@politala.ac.id',
                'phone' => '081234567890',
                'foto' => null
            ];
        }

        return view('proposalpkl', compact('mahasiswa'));
    }
}
