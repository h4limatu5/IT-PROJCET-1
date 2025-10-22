@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Nilai PKL</h1>

    @if($role === 'dosen' || $role === 'perusahaan' || $role === 'mitra' || $role === 'kaprodi' || $role === 'admin')
        <a href="{{ route('nilai.create', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-primary">Tambah Nilai</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mahasiswa</th>
                <th>Dosen</th>
                <th>Perusahaan</th>
                <th>Nilai Dosen</th>
                <th>Nilai Perusahaan</th>
                <th>Nilai Akhir</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($nilais as $nilai)
                <tr>
                    <td>{{ $nilai->mahasiswa->name ?? 'N/A' }}</td>
                    <td>{{ $nilai->dosen->name ?? 'N/A' }}</td>
                    <td>{{ $nilai->perusahaan->name ?? 'N/A' }}</td>
                    <td>{{ $nilai->nilai_dosen ?? '-' }}</td>
                    <td>{{ $nilai->nilai_perusahaan ?? '-' }}</td>
                    <td>{{ $nilai->nilai_akhir ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $nilai->status === 'approved' ? 'success' : ($nilai->status === 'submitted' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($nilai->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('nilai.show', [$nilai->id, 'role' => $role, 'user_id' => $userId]) }}" class="btn btn-sm btn-info">Lihat</a>
                        @if(($role === 'dosen' && $nilai->dosen_id == $userId) || ($role === 'perusahaan' && $nilai->perusahaan_id == $userId) || $role === 'kaprodi' || $role === 'admin')
                            <a href="{{ route('nilai.edit', [$nilai->id, 'role' => $role, 'user_id' => $userId]) }}" class="btn btn-sm btn-warning">Edit</a>
                        @endif
                        @if($role === 'kaprodi' || $role === 'admin')
                            <form action="{{ route('nilai.destroy', [$nilai->id, 'role' => $role, 'user_id' => $userId]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus nilai ini?')">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data nilai</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
