@extends('layouts.app')

@section('page-class', 'content-margin')
@section('hide-footer', 'd-none')

<!-- Header -->
@include('Employers.components.header');

@section('content')
<div class="mx-auto login-form p-4 p-sm-0 pt-5 pt-lg-4">
    <div class="card shadow-lg border-0 rounded-4 p-4 " style="max-width: 400px; margin: auto;">
        <div class="mb-3 text-center">
            <h2 id="signInH2" class="fw-bold text-primary">Sign In</h2>
            <h3 id="resetH2" class=" d-none fw-bold text-primary">Reset Password</h3>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
        <div class="alert alert-danger text-center">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form id="signInForm" method="post" action="{{ route('employer.login.process') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <input type="email" name="email" class="form-control rounded-3" id="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" id="password" class="form-control rounded-3" required>
            </div>
            <div class="mb-3 d-flex justify-content-center d-md-none">
                <a href="{{ route('employer.register') }}" class="small text-primary">New Employer? Sign Up First</a>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
            </div>
            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('employer.register') }}" class="text-decoration-none text-primary d-none d-md-block">New Employer? Sign Up First</a>
                <a href="#" id="forgotBtn" class="text-decoration-none text-danger">Forgot Password?</a>
            </div>
        </form>

        <form id="resetForm" class="d-none" method="post" action="{{ route('employer.reset.pass') }}">
            @csrf
            <div id="reset">
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" name="email" class="form-control rounded-3" id="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" id="password" class="form-control rounded-3" placeholder="Enter password" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirm" class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirm" class="form-control rounded-3" placeholder="Confirm password" required>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary w-100 py-2">Reset Password</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let signInForm = document.getElementById('signInForm');
            let resetForm = document.getElementById('resetForm');
            let forgotBtn = document.getElementById('forgotBtn');
            let signInH2 = document.getElementById('signInH2');
            let resetH2 = document.getElementById('resetH2');

            forgotBtn.addEventListener('click', () => {
                signInForm.classList.add('d-none');
                signInH2.classList.add('d-none');
                resetForm.classList.remove('d-none');
                resetH2.classList.remove('d-none');
            })


        })
    </script>
</div>
@endsection