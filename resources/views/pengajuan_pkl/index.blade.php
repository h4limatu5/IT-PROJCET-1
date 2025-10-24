@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pengajuan PKL</h4>
                    <a href="{{ route('pengajuan-pkl.create') }}" class="btn btn-primary">Ajukan PKL Baru</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Perusahaan</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Diajukan Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengajuanPKLs as $pengajuan)
                                <tr>
                                    <td>{{ $pengajuan->perusahaan->name }}</td>
                                    <td>{{ $pengajuan->description }}</td>
                                    <td>
                                        <span class="badge bg-{{ $pengajuan->status == 'approved' ? 'success' : ($pengajuan->status == 'rejected' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($pengajuan->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $pengajuan->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('pengajuan-pkl.show', $pengajuan) }}" class="btn btn-sm btn-info">Lihat</a>
                                        @if($pengajuan->status == 'pending')
                                            <a href="{{ route('pengajuan-pkl.edit', $pengajuan) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('pengajuan-pkl.destroy', $pengajuan) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada pengajuan PKL.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
