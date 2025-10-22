@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mahasiswa</h1>

    <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $mahasiswa->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}" required>
        </div>

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required>
        </div>

        <div class="form-group">
            <label for="prodi_id">Prodi</label>
            <select class="form-control" id="prodi_id" name="prodi_id" required>
                <option value="">Pilih Prodi</option>
                @foreach($prodis as $prodi)
                    <option value="{{ $prodi->id }}" {{ $mahasiswa->prodi_id == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $mahasiswa->phone }}">
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            @if($mahasiswa->photo)
                <img src="{{ asset('storage/' . $mahasiswa->photo) }}" alt="Current Photo" width="100" height="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
