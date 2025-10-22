@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Program Studi</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('prodi.create') }}" class="btn btn-primary mb-3">Tambah Program Studi</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama Program Studi</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($prodis as $prodi)
                                <tr>
                                    <td>
                                        @if($prodi->photo)
                                            <img src="{{ asset('storage/' . $prodi->photo) }}" alt="Foto {{ $prodi->nama_prodi }}" style="max-width: 50px; max-height: 50px; object-fit: cover;">
                                        @else
                                            Tidak ada foto
                                        @endif
                                    </td>
                                    <td>{{ $prodi->nama_prodi }}</td>
                                    <td>{{ $prodi->deskripsi ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('prodi.show', $prodi) }}" class="btn btn-sm btn-info">Lihat</a>
                                        <a href="{{ route('prodi.edit', $prodi) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('prodi.destroy', $prodi) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data program studi</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
