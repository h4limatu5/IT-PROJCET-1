@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Seminar</h1>
    <p><strong>Title:</strong> {{ $seminar->title }}</p>
    <p><strong>Description:</strong> {{ $seminar->description }}</p>
    <p><strong>Date:</strong> {{ $seminar->date }}</p>
    <p><strong>Time:</strong> {{ $seminar->time }}</p>
    <p><strong>Location:</strong> {{ $seminar->location }}</p>
    <p><strong>Status:</strong> {{ $seminar->status }}</p>
    <a href="{{ route('seminar.index', ['role' => $role, 'user_id' => $userId]) }}" class="btn btn-secondary">Back</a>
</div>
@endsection
