@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Dokumen</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dokumen.update', $dokumen) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="title">Judul Dokumen</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $dokumen->title }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $dokumen->description }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="file">File Dokumen (Opsional)</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah file. Maksimal 2MB. Format: PDF, DOC, DOCX, JPG, JPEG, PNG</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
