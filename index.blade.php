@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Seminar</h1>
    @if($role === 'mahasiswa')
        <a href="{{ route('seminar.create', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-primary">Tambah Seminar</a>
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
            @foreach($seminars as $seminar)
                <tr>
                    <td>{{ $seminar->title }}</td>
                    <td>{{ $seminar->date }}</td>
                    <td>{{ $seminar->time }}</td>
                    <td>{{ $seminar->location }}</td>
                    <td>{{ $seminar->status }}</td>
                    <td>
                        <a href="{{ route('seminar.show', [$seminar->id, 'role' => $role, 'user_id' => $userId]) }}" class="btn btn-info">View</a>
                        @if($role === 'dosen')
                            <a href="{{ route('seminar.edit', [$seminar->id, 'role' => $role, 'user_id' => $userId]) }}" class="btn btn-warning">Validate</a>
                        @endif
                        @if($role === 'mahasiswa' && $seminar->mahasiswa_id == $userId)
                            <form action="{{ route('seminar.destroy', [$seminar->id, 'role' => $role, 'user_id' => $userId]) }}" method="POST" style="display:inline;">
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
