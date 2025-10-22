@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Bimbingan</h1>
    @if($role === 'mahasiswa')
        <a href="{{ route('bimbingan.create', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-primary">Tambah Bimbingan</a>
        <a href="{{ route('dashmhs') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    @endif
    @if($role === 'dosen')
        <a href="{{ route('dashdosen') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    @endif
    @if($role === 'kaprodi')
        <a href="{{ route('dashkaprodi') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    @endif
    @if($role === 'admin')
        <a href="{{ route('dashadmin') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bimbingans as $bimbingan)
                <tr>
                    <td>{{ $bimbingan->title }}</td>
                    <td>{{ $bimbingan->date }}</td>
                    <td>{{ $bimbingan->time }}</td>
                    <td>{{ $bimbingan->location }}</td>
                    <td>{{ $bimbingan->status }}</td>
                    <td>
                        <a href="{{ route('bimbingan.show', [$bimbingan->id, 'role' => $role, 'user_id' => $userId]) }}" class="btn btn-info">View</a>
                        @if($role === 'dosen')
                            <a href="{{ route('bimbingan.edit', [$bimbingan->id, 'role' => $role, 'user_id' => $userId]) }}" class="btn btn-warning">Validate</a>
                        @endif
                        @if($role === 'mahasiswa' && $bimbingan->mahasiswa_id == $userId)
                            <form action="{{ route('bimbingan.destroy', [$bimbingan->id, 'role' => $role, 'user_id' => $userId]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
