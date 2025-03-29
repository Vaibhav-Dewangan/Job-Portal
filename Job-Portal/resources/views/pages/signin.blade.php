@extends('layouts.app')

@section('page-class', 'content-margin')
@section('hide-footer', 'd-none')

@section('content')
<div class="mx-auto login-form p-4 p-sm-0 pt-5 pt-lg-4">
    <div class="card shadow-lg border-0 rounded-4 p-4 " style="max-width: 400px; margin: auto;">
        <div class="mb-3 text-center">
            <h2 class="fw-bold text-primary">Sign In</h2>
        </div>
        <form>
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <input type="email" class="form-control rounded-3" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" id="password" class="form-control rounded-3">
            </div>
            <div class="mb-3 d-flex justify-content-center d-md-none">
                <a href="{{ route('signup') }}" class="small text-primary">New User? Sign Up First</a>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-primary w-100 py-2">Login</button>
            </div>
            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('signup') }}" class="text-decoration-none text-primary d-none d-md-block">New User? Sign Up First</a>
                <a href="#" class="text-decoration-none text-danger">Forgot Password?</a>
            </div>
        </form>
    </div>
</div>
@endsection