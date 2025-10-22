@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Mahasiswa Bulk</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <strong>Format JSON:</strong> Masukkan data mahasiswa dalam format JSON array. Contoh:
                        <pre>
[
    {
        "name": "John Doe",
        "email": "john@example.com",
        "nim": "12345678",
        "prodi_id": 1,
        "phone": "08123456789"
    },
    {
        "name": "Jane Smith",
        "email": "jane@example.com",
        "nim": "87654321",
        "prodi_id": 2,
        "phone": "08987654321"
    }
]
                        </pre>
                        <strong>Catatan:</strong>
                        <ul>
                            <li><code>name</code>, <code>email</code>, <code>nim</code>, <code>prodi_id</code> wajib diisi</li>
                            <li><code>phone</code> opsional</li>
                            <li><code>prodi_id</code> harus sesuai dengan ID prodi yang ada</li>
                        </ul>
                    </div>

                    <form action="{{ route('mahasiswa.bulkStore') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="mahasiswas">Data Mahasiswa (JSON)</label>
                            <textarea class="form-control" id="mahasiswas" name="mahasiswas" rows="15" required></textarea>
                            @error('mahasiswas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Semua</button>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
