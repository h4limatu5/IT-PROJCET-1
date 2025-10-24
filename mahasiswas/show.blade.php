@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($mahasiswa->foto)
                                <img src="{{ asset('storage/profile_photos/'.$mahasiswa->foto) }}" alt="Foto Profil" class="img-fluid rounded">
                            @else
                                <div class="bg-light text-center p-5 rounded">
                                    <i class="fas fa-user fa-3x text-muted"></i>
                                    <p class="mt-2">No Photo</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="150">NIM:</th>
                                    <td>{{ $mahasiswa->nim }}</td>
                                </tr>
                                <tr>
                                    <th>Nama:</th>
                                    <td>{{ $mahasiswa->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $mahasiswa->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $mahasiswa->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Program Studi:</th>
                                    <td>{{ $mahasiswa->program_studi }}</td>
                                </tr>
                                <tr>
                                    <th>Dibuat:</th>
                                    <td>{{ $mahasiswa->created_at->format('d M Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Diupdate:</th>
                                    <td>{{ $mahasiswa->updated_at->format('d M Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('mahasiswas.edit', $mahasiswa) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
