@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Pengajuan PKL</h4>
                    <a href="{{ route('pengajuan-pkl.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Perusahaan</h5>
                            <p>{{ $pengajuanPKL->perusahaan->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Status</h5>
                            <span class="badge bg-{{ $pengajuanPKL->status == 'approved' ? 'success' : ($pengajuanPKL->status == 'rejected' ? 'danger' : 'warning') }}">
                                {{ ucfirst($pengajuanPKL->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Deskripsi</h5>
                            <p>{{ $pengajuanPKL->description ?: 'Tidak ada deskripsi' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Diajukan Pada</h5>
                            <p>{{ $pengajuanPKL->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        @if($pengajuanPKL->approved_at)
                        <div class="col-md-6">
                            <h5>Disetujui Pada</h5>
                            <p>{{ $pengajuanPKL->approved_at->format('d/m/Y H:i') }}</p>
                        </div>
                        @endif
                    </div>
                    @if($pengajuanPKL->validator)
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Disetujui Oleh</h5>
                            <p>{{ $pengajuanPKL->validator->name }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
