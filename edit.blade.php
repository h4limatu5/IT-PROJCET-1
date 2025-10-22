@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Validasi Seminar</h1>
    <form action="{{ route('seminar.update', [$seminar->id, 'role' => $role, 'user_id' => $userId]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $seminar->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $seminar->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $seminar->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('seminar.index', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
