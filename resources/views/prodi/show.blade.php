@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Program Studi</h3>
                </div>
                <div class="card-body">
                    @if($prodi->photo)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $prodi->photo) }}" alt="Foto {{ $prodi->nama_prodi }}" style="max-width: 300px; max-height: 300px; object-fit: cover; border-radius: 8px;">
                        </div>
                    @endif
                    <h4>{{ $prodi->nama_prodi }}</h4>
                    <p><strong>Deskripsi:</strong> {{ $prodi->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                    <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('prodi.edit', $prodi) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
