@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Validasi Bimbingan</h1>
    <form action="{{ route('bimbingan.update', [$bimbingan->id, 'role' => $role, 'user_id' => $userId]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $bimbingan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $bimbingan->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $bimbingan->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('bimbingan.index', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
