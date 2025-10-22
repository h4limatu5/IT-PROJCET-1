@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Nilai PKL</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nilai Mahasiswa: {{ $nilai->mahasiswa->name ?? 'N/A' }}</h5>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>NIM:</strong> {{ $nilai->mahasiswa->nim ?? 'N/A' }}</p>
                    <p><strong>Dosen Pembimbing:</strong> {{ $nilai->dosen->name ?? 'N/A' }}</p>
                    <p><strong>Perusahaan:</strong> {{ $nilai->perusahaan->name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Nilai Dosen:</strong> {{ $nilai->nilai_dosen ?? '-' }}</p>
                    <p><strong>Nilai Perusahaan:</strong> {{ $nilai->nilai_perusahaan ?? '-' }}</p>
                    <p><strong>Nilai Akhir:</strong> {{ $nilai->nilai_akhir ?? '-' }}</p>
                    <p><strong>Status:</strong>
                        <span class="badge bg-{{ $nilai->status === 'approved' ? 'success' : ($nilai->status === 'submitted' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($nilai->status) }}
                        </span>
                    </p>
                </div>
            </div>

            @if($nilai->komentar_dosen)
                <div class="mt-3">
                    <h6>Komentar Dosen:</h6>
                    <p>{{ $nilai->komentar_dosen }}</p>
                </div>
            @endif

            @if($nilai->komentar_perusahaan)
                <div class="mt-3">
                    <h6>Komentar Perusahaan:</h6>
                    <p>{{ $nilai->komentar_perusahaan }}</p>
                </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('nilai.index', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-secondary">Kembali</a>
                @if(($role === 'dosen' && $nilai->dosen_id == $userId) || $role === 'kaprodi' || $role === 'admin')
                    <a href="{{ route('nilai.edit', [$nilai->id, 'role' => $role, 'user_id' => $userId]) }}" class="btn btn-warning">Edit</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
