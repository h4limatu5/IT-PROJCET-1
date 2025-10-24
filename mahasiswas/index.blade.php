@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Mahasiswa
                        <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary float-end">Tambah Mahasiswa</a>
                    </h4>
                </div>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Program Studi</th>
                                <th>Phone</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>{{ $mahasiswa->id }}</td>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>{{ $mahasiswa->name }}</td>
                                    <td>{{ $mahasiswa->email }}</td>
                                    <td>{{ $mahasiswa->program_studi }}</td>
                                    <td>{{ $mahasiswa->phone }}</td>
                                    <td>
                                        @if($mahasiswa->foto)
                                            <img src="{{ asset('storage/profile_photos/'.$mahasiswa->foto) }}" alt="Foto" width="50" height="50" style="object-fit: cover;">
                                        @else
                                            <span class="text-muted">No Photo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('mahasiswas.show', $mahasiswa) }}" class="btn btn-info btn-sm">Lihat</a>
                                        <a href="{{ route('mahasiswas.edit', $mahasiswa) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('mahasiswas.destroy', $mahasiswa) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $mahasiswas->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
