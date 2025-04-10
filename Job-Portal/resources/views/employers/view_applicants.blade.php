@extends('layouts.app')

@section('page-class', 'content-margin-employer mt-5 pt-5')

<!-- Header -->
@include('employers.components.header')

@section('content')
<div class="container mt-lg-3" style="min-height: 90vh;">
    <h4 class="py-3">Applied Users</h4>
    @if($applications->count() > 0)
    @foreach($applications as $app)
    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $app->user->name }}</h5>
            <p><strong>Email:</strong> {{ $app->user->email }}</p>
            @if(!empty($app->user->contact))
            <p><strong>Contact:</strong> {{ $app->user->contact }}</p>
            @endif
            @if(!empty($app->user->location))
            <p><strong>Location:</strong> {{ $app->user->location }}</p>
            @endif
            <p><strong>Cover Letter:</strong><br> {{ $app->cover_letter ?? 'Not provided' }}</p>
            @if($app->resume)
            <a href="{{ asset('storage/' . $app->resume) }}" target="_blank" class="btn btn-sm btn-primary">View Resume</a>
            @else
            <span class="text-muted">No resume uploaded</span>
            @endif
        </div>
    </div>
    @endforeach
    @else
    <p>No users have applied for this job yet.</p>
    @endif
</div>
@endsection