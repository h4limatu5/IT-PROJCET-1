@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Dosen</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">Tambah Dosen</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NIP</th>
                                    <th>Program Studi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dosens as $dosen)
                                <tr>
                                    <td>{{ $dosen->name }}</td>
                                    <td>{{ $dosen->email }}</td>
                                    <td>{{ $dosen->nip }}</td>
                                    <td>{{ $dosen->prodi->nama_prodi ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('dosen.show', $dosen) }}" class="btn btn-sm btn-info">Lihat</a>
                                        <a href="{{ route('dosen.edit', $dosen) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('dosen.destroy', $dosen) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data dosen</td>
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
