@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Dosen</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dosen.update', $dosen) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $dosen->name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $dosen->email }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="{{ $dosen->nip }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="prodi_id">Program Studi</label>
                            <select class="form-control" id="prodi_id" name="prodi_id" required>
                                <option value="">Pilih Program Studi</option>
                                @foreach($prodis as $prodi)
                                    <option value="{{ $prodi->id }}" {{ $dosen->prodi_id == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
