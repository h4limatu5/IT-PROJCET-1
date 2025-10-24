<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kaprodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Assuming role-based access, for now using hardcoded user_id
        $userId = 1; // User ID
        $role = 'mahasiswa'; // This should come from authentication, set to 'mahasiswa' for testing upload functionality

        if ($role == 'mahasiswa') {
            $dokumens = Dokumen::where('mahasiswa_id', $userId)->get();
        } elseif ($role == 'admin') {
            $dokumens = Dokumen::all();
        } elseif ($role == 'dosen') {
            // Assuming dosen supervises mahasiswa, need to adjust based on actual relationship
            $dosen = Dosen::find($userId);
            $mahasiswaIds = Mahasiswa::where('prodi_id', $dosen->prodi_id)->pluck('id');
            $dokumens = Dokumen::whereIn('mahasiswa_id', $mahasiswaIds)->get();
        } elseif ($role == 'kaprodi') {
            $kaprodi = Kaprodi::find($userId);
            $mahasiswaIds = Mahasiswa::where('prodi_id', $kaprodi->prodi_id)->pluck('id');
            $dokumens = Dokumen::whereIn('mahasiswa_id', $mahasiswaIds)->get();
        } else {
            $dokumens = collect();
        }

        return view('dokumen.index', compact('dokumens', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokumen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $filePath = $request->file('file')->store('dokumens', 'public');

        Dokumen::create([
            'mahasiswa_id' => 1, // Hardcoded, should be Auth::id()
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dokumen = Dokumen::findOrFail($id);
        return view('dokumen.show', compact('dokumen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokumen = Dokumen::findOrFail($id);
        // Check if user owns the document or has permission
        if ($dokumen->mahasiswa_id != 1) { // Hardcoded
            abort(403);
        }
        return view('dokumen.edit', compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dokumen = Dokumen::findOrFail($id);

        if ($dokumen->mahasiswa_id != 1) { // Hardcoded
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($dokumen->file_path);
            $data['file_path'] = $request->file('file')->store('dokumens', 'public');
        }

        $dokumen->update($data);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokumen = Dokumen::findOrFail($id);

        if ($dokumen->mahasiswa_id != 1) { // Hardcoded
            abort(403);
        }

        Storage::disk('public')->delete($dokumen->file_path);
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen deleted successfully.');
    }

    /**
     * Validate document (for Kaprodi and Dosen)
     */
    public function validateDocument(Request $request, $id)
    {
        $dokumen = Dokumen::findOrFail($id);

        $request->validate([
            'status' => 'required|in:validated,rejected',
        ]);

        // Assuming role-based access, for now using hardcoded user_id and role
        $userId = 1; // User ID
        $role = 'kaprodi'; // This should come from authentication, can be 'kaprodi' or 'dosen'

        $validatorType = ($role == 'kaprodi') ? 'kaprodi' : 'dosen';

        $dokumen->update([
            'status' => $request->status,
            'validated_by' => $userId,
            'validator_type' => $validatorType,
            'validated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Dokumen validated successfully.');
    }
}
