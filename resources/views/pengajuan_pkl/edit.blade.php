@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Pengajuan PKL</h4>
                    <a href="{{ route('pengajuan-pkl.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengajuan-pkl.update', $pengajuanPKL) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="perusahaan_id">Perusahaan</label>
                            <select name="perusahaan_id" id="perusahaan_id" class="form-control" required>
                                <option value="">Pilih Perusahaan</option>
                                @foreach($perusahaans as $perusahaan)
                                    <option value="{{ $perusahaan->id }}" {{ $pengajuanPKL->perusahaan_id == $perusahaan->id ? 'selected' : '' }}>{{ $perusahaan->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Jelaskan alasan pengajuan PKL...">{{ $pengajuanPKL->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
