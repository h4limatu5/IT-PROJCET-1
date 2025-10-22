@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mahasiswa</h1>

    <div class="mb-3">
        <a href="{{ route('mahasiswa.bulkCreate') }}" class="btn btn-success">Tambah Bulk</a>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Phone</th>
                    <th>Photo</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->id }}</td>
                    <td>{{ $mahasiswa->name }}</td>
                    <td>{{ $mahasiswa->email }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->prodi->nama_prodi ?? 'N/A' }}</td>
                    <td>{{ $mahasiswa->phone ?? 'N/A' }}</td>
                    <td>
                        @if($mahasiswa->photo)
                            <img src="{{ asset('storage/' . $mahasiswa->photo) }}" alt="Photo" width="50" height="50">
                        @else
                            No Photo
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('mahasiswa.show', $mahasiswa) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('mahasiswa.profile', $mahasiswa) }}" class="btn btn-secondary btn-sm">Profil</a>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
