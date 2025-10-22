@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Nilai PKL</h1>

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf

        <input type="hidden" name="role" value="{{ $role }}">
        <input type="hidden" name="user_id" value="{{ $userId }}">

        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_id" id="mahasiswa_id" class="form-control" required>
                <option value="">Pilih Mahasiswa</option>
                @foreach($mahasiswas as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->name }} ({{ $mahasiswa->nim }})</option>
                @endforeach
            </select>
        </div>

        @if($role !== 'perusahaan')
        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen Pembimbing</label>
            <select name="dosen_id" id="dosen_id" class="form-control">
                <option value="">Pilih Dosen</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                @endforeach
            </select>
        </div>
        @endif

        @if($role !== 'dosen')
        <div class="mb-3">
            <label for="perusahaan_id" class="form-label">Perusahaan</label>
            <select name="perusahaan_id" id="perusahaan_id" class="form-control">
                <option value="">Pilih Perusahaan</option>
                @foreach($perusahaans as $perusahaan)
                    <option value="{{ $perusahaan->id }}">{{ $perusahaan->name }}</option>
                @endforeach
            </select>
        </div>
        @endif

        @if($role !== 'perusahaan')
        <div class="mb-3">
            <label for="nilai_dosen" class="form-label">Nilai Dosen (0-100)</label>
            <input type="number" name="nilai_dosen" id="nilai_dosen" class="form-control" min="0" max="100" step="0.01">
        </div>

        <div class="mb-3">
            <label for="komentar_dosen" class="form-label">Komentar Dosen</label>
            <textarea name="komentar_dosen" id="komentar_dosen" class="form-control" rows="3"></textarea>
        </div>
        @endif

        @if($role !== 'dosen')
        <div class="mb-3">
            <label for="nilai_perusahaan" class="form-label">Nilai Perusahaan (0-100)</label>
            <input type="number" name="nilai_perusahaan" id="nilai_perusahaan" class="form-control" min="0" max="100" step="0.01">
        </div>

        <div class="mb-3">
            <label for="komentar_perusahaan" class="form-label">Komentar Perusahaan</label>
            <textarea name="komentar_perusahaan" id="komentar_perusahaan" class="form-control" rows="3"></textarea>
        </div>
        @endif

        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
        <a href="{{ route('nilai.index', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
