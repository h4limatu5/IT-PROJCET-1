@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Perusahaan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>{{ $perusahaan->nama_perusahaan }}</h4>
                            <p><strong>Alamat:</strong> {{ $perusahaan->alamat }}</p>
                            @if($perusahaan->provinsi)
                                <p><strong>Provinsi:</strong> {{ $perusahaan->provinsi }}</p>
                            @endif
                            <p><strong>Telepon:</strong> {{ $perusahaan->telepon }}</p>
                            <p><strong>Email:</strong> {{ $perusahaan->email }}</p>
                            @if($perusahaan->deskripsi)
                                <p><strong>Deskripsi:</strong> {{ $perusahaan->deskripsi }}</p>
                            @endif
                            <p><strong>Program Studi:</strong></p>
                            <ul>
                                @forelse($perusahaan->prodis as $prodi)
                                    <li>{{ $prodi->nama_prodi }}</li>
                                @empty
                                    <li>Tidak ada program studi yang terkait</li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="col-md-4">
                            @if($perusahaan->logo)
                                <img src="{{ asset('storage/' . $perusahaan->logo) }}" alt="Logo" class="img-fluid">
                            @else
                                <p>Tidak ada logo</p>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('perusahaan.edit', $perusahaan) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
