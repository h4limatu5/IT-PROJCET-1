@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Mahasiswa</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $mahasiswa->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $mahasiswa->email }}</p>
            <p class="card-text"><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
            <p class="card-text"><strong>Prodi:</strong> {{ $mahasiswa->prodi->nama_prodi ?? 'N/A' }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $mahasiswa->phone ?? 'N/A' }}</p>
            @if($mahasiswa->photo)
                <p class="card-text"><strong>Photo:</strong></p>
                <img src="{{ asset('storage/' . $mahasiswa->photo) }}" alt="Photo" width="150" height="150">
            @endif
        </div>
    </div>

    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('mahasiswa.profile', $mahasiswa) }}" class="btn btn-info mt-3">Profil</a>
</div>
@endsection
