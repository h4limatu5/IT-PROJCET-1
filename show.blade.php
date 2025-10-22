@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Dosen</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Informasi Dasar</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama:</th>
                                    <td>{{ $dosen->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $dosen->email }}</td>
                                </tr>
                                <tr>
                                    <th>NIP:</th>
                                    <td>{{ $dosen->nip }}</td>
                                </tr>
                                <tr>
                                    <th>Program Studi:</th>
                                    <td>{{ $dosen->prodi->nama_prodi ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Statistik</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Jumlah Bimbingan:</th>
                                    <td>{{ $dosen->bimbingans->count() }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Seminar:</th>
                                    <td>{{ $dosen->seminars->count() }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Nilai:</th>
                                    <td>{{ $dosen->nilais->count() }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="{{ route('dosen.edit', $dosen) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
