@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Bimbingan</h1>
    <form action="{{ route('bimbingan.store', ['role' => $role, 'user_id' => $userId]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" name="time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->id }}">
        <div class="form-group">
            <label for="dosen_id">Dosen (Opsional)</label>
            <select name="dosen_id" class="form-control">
                <option value="">Pilih Dosen (Opsional)</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="perusahaan_id">Perusahaan</label>
            <select name="perusahaan_id" class="form-control" required>
                @foreach($perusahaans as $perusahaan)
                    <option value="{{ $perusahaan->id }}">{{ $perusahaan->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a href="{{ route('bimbingan.index', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
