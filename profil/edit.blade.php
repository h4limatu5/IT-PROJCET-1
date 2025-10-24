@extends('layouts.app')

@section('content')
<div class="container" style="max-width:600px; margin-top:40px;">
    <div class="card p-4 shadow-sm">
        <h3 class="mb-4 text-center">Edit Profil</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->name ?? $mahasiswa->nama ?? '') }}">
                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}">
                @error('nim') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $mahasiswa->phone ?? $mahasiswa->no_hp ?? '') }}">
                @error('no_hp') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="program_studi" class="form-label">Program Studi</label>
                <input type="text" name="program_studi" class="form-control" value="{{ old('program_studi', $mahasiswa->program_studi) }}">
                @error('program_studi') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3 text-center">
                <img src="{{ $mahasiswa->foto ? asset('storage/profile_photos/'.$mahasiswa->foto) : asset('images/default-avatar.png') }}"
                     alt="Foto Profil" width="120" height="120" style="object-fit:cover;border-radius:50%;margin-bottom:10px;">
                <input type="file" name="foto" class="form-control mt-2" accept="image/*">
                @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <i class="fa-solid fa-save"></i> Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection
