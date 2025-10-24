@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Dokumen</h3>
                </div>
                <div class="card-body">
                    @if($role == 'mahasiswa')
                        <a href="{{ route('dokumen.create') }}" class="btn btn-primary mb-3">Upload Dokumen</a>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Tanggal Upload</th>
                                    @if(in_array($role, ['kaprodi', 'dosen']))
                                        <th>Validator</th>
                                    @endif
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dokumens as $dokumen)
                                <tr>
                                    <td>{{ $dokumen->title }}</td>
                                    <td>{{ $dokumen->description ?: '-' }}</td>
                                    <td>
                                        @if($dokumen->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($dokumen->status == 'validated')
                                            <span class="badge bg-success">Validated</span>
                                        @elseif($dokumen->status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>{{ $dokumen->created_at->format('d/m/Y') }}</td>
                                    @if(in_array($role, ['kaprodi', 'dosen']))
                                        <td>
                                            @if($dokumen->validator)
                                                {{ $dokumen->validator->name }} ({{ ucfirst($dokumen->validator_type) }})
                                            @else
                                                -
                                            @endif
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ route('dokumen.show', $dokumen) }}" class="btn btn-sm btn-info">Lihat</a>
                                        @if($role == 'mahasiswa')
                                            <a href="{{ route('dokumen.edit', $dokumen) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('dokumen.destroy', $dokumen) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">Hapus</button>
                                            </form>
                                        @elseif($dokumen->status == 'pending' && in_array($role, ['kaprodi', 'dosen']))
                                            <form action="{{ route('dokumen.validate', $dokumen) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="status" value="validated">
                                                <button type="submit" class="btn btn-sm btn-success">Validasi</button>
                                            </form>
                                            <form action="{{ route('dokumen.validate', $dokumen) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ in_array($role, ['kaprodi', 'dosen']) ? 6 : 5 }}" class="text-center">Tidak ada dokumen</td>
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
