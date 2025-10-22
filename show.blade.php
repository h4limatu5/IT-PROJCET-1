@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Dokumen</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Judul: {{ $dokumen->title }}</h5>
                            <p><strong>Deskripsi:</strong> {{ $dokumen->description ?: '-' }}</p>
                            <p><strong>Status:</strong>
                                @if($dokumen->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($dokumen->status == 'validated')
                                    <span class="badge bg-success">Validated</span>
                                @elseif($dokumen->status == 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </p>
                            <p><strong>Tanggal Upload:</strong> {{ $dokumen->created_at->format('d/m/Y H:i') }}</p>
                            @if($dokumen->validated_at)
                                <p><strong>Tanggal Validasi:</strong> {{ \Carbon\Carbon::parse($dokumen->validated_at)->format('d/m/Y H:i') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h5>File</h5>
                            <a href="{{ asset('storage/' . $dokumen->file_path) }}" target="_blank" class="btn btn-primary">Lihat File</a>
                        </div>
                    </div>
                    <hr>
                    <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">Kembali</a>
                    @if(Auth::user()->role == 'mahasiswa' && $dokumen->mahasiswa_id == Auth::id())
                        <a href="{{ route('dokumen.edit', $dokumen) }}" class="btn btn-warning">Edit</a>
                    @endif
                    @if((Auth::user()->role == 'kaprodi' || Auth::user()->role == 'dosen') && $dokumen->status == 'pending')
                        <form action="{{ route('dokumen.validate', $dokumen) }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="status" value="validated">
                            <button type="submit" class="btn btn-success">Validasi</button>
                        </form>
                        <form action="{{ route('dokumen.validate', $dokumen) }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
