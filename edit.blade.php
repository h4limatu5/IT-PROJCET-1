@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Nilai PKL</h1>

    <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="role" value="{{ $role }}">
        <input type="hidden" name="user_id" value="{{ $userId }}">

        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_id" id="mahasiswa_id" class="form-control" required disabled>
                <option value="{{ $nilai->mahasiswa_id }}" selected>{{ $nilai->mahasiswa->name ?? 'N/A' }} ({{ $nilai->mahasiswa->nim ?? '' }})</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen Pembimbing</label>
            <select name="dosen_id" id="dosen_id" class="form-control" disabled>
                <option value="{{ $nilai->dosen_id }}" selected>{{ $nilai->dosen->name ?? 'N/A' }}</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="perusahaan_id" class="form-label">Perusahaan</label>
            <select name="perusahaan_id" id="perusahaan_id" class="form-control" disabled>
                <option value="{{ $nilai->perusahaan_id }}" selected>{{ $nilai->perusahaan->name ?? 'N/A' }}</option>
            </select>
        </div>

        @if($role === 'dosen')
            <div class="mb-3">
                <label for="nilai_dosen" class="form-label">Nilai Dosen (0-100)</label>
                <input type="number" name="nilai_dosen" id="nilai_dosen" class="form-control" min="0" max="100" step="0.01" value="{{ $nilai->nilai_dosen }}">
            </div>

            <div class="mb-3">
                <label for="komentar_dosen" class="form-label">Komentar Dosen</label>
                <textarea name="komentar_dosen" id="komentar_dosen" class="form-control" rows="3">{{ $nilai->komentar_dosen }}</textarea>
            </div>
        @endif

        @if($role === 'perusahaan')
            <div class="mb-3">
                <label for="nilai_perusahaan" class="form-label">Nilai Perusahaan (0-100)</label>
                <input type="number" name="nilai_perusahaan" id="nilai_perusahaan" class="form-control" min="0" max="100" step="0.01" value="{{ $nilai->nilai_perusahaan }}">
            </div>

            <div class="mb-3">
                <label for="komentar_perusahaan" class="form-label">Komentar Perusahaan</label>
                <textarea name="komentar_perusahaan" id="komentar_perusahaan" class="form-control" rows="3">{{ $nilai->komentar_perusahaan }}</textarea>
            </div>
        @endif

        @if($role === 'kaprodi' || $role === 'admin')
            <div class="mb-3">
                <label for="nilai_dosen" class="form-label">Nilai Dosen (0-100)</label>
                <input type="number" name="nilai_dosen" id="nilai_dosen" class="form-control" min="0" max="100" step="0.01" value="{{ $nilai->nilai_dosen }}">
            </div>

            <div class="mb-3">
                <label for="nilai_perusahaan" class="form-label">Nilai Perusahaan (0-100)</label>
                <input type="number" name="nilai_perusahaan" id="nilai_perusahaan" class="form-control" min="0" max="100" step="0.01" value="{{ $nilai->nilai_perusahaan }}">
            </div>

            <div class="mb-3">
                <label for="komentar_dosen" class="form-label">Komentar Dosen</label>
                <textarea name="komentar_dosen" id="komentar_dosen" class="form-control" rows="3">{{ $nilai->komentar_dosen }}</textarea>
            </div>

            <div class="mb-3">
                <label for="komentar_perusahaan" class="form-label">Komentar Perusahaan</label>
                <textarea name="komentar_perusahaan" id="komentar_perusahaan" class="form-control" rows="3">{{ $nilai->komentar_perusahaan }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="draft" {{ $nilai->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="submitted" {{ $nilai->status === 'submitted' ? 'selected' : '' }}>Submitted</option>
                    <option value="approved" {{ $nilai->status === 'approved' ? 'selected' : '' }}>Approved</option>
                </select>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Update Nilai</button>
        <a href="{{ route('nilai.index', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
