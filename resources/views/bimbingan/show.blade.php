@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Bimbingan</h1>
    <p><strong>Title:</strong> {{ $bimbingan->title }}</p>
    <p><strong>Description:</strong> {{ $bimbingan->description }}</p>
    <p><strong>Date:</strong> {{ $bimbingan->date }}</p>
    <p><strong>Time:</strong> {{ $bimbingan->time }}</p>
    <p><strong>Location:</strong> {{ $bimbingan->location }}</p>
    <p><strong>Status:</strong> {{ $bimbingan->status }}</p>
    <a href="{{ route('bimbingan.index', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-secondary">Back</a>
</div>
@endsection
