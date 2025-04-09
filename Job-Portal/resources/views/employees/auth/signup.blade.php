@extends('layouts.app')

@section('page-class', 'content-margin')
@section('hide-footer', 'd-none')

<!-- Header -->
@include('employees.components.header')

@section('content')
<div class="mx-auto login-form p-4 p-sm-0 pt-5 pt-lg-4">
    <div class="card shadow-lg border-0 rounded-4 p-4 " style="max-width: 400px; margin: auto;">
        <div class="mb-3 text-center">
            <h2 class="fw-bold text-primary">Sign Up</h2>
        </div>
        <form id="signupForm" action="{{ route('register.store') }}" method="post">
            @csrf
            <div id="step1" class="form-step">
                <div class="mb-3">
                    <label for="text" class="form-label fw-semibold">Full Name</label>
                    <input type="text" class="form-control rounded-3" name="full_name" id="full_name" placeholder="Your name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" class="form-control rounded-3" name="email" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="user-type" class="form-label text-body-emphasis">User Type</label>
                    <select class="form-select" name="user_type" id="user-type">
                        <option value="employee">Employee</option>
                    </select>
                </div>

                <div class="mb-3 d-flex justify-content-center ">
                    <a href="{{ route('login') }}" class="small text-primary">Already have an account?</a>
                </div>

                <button type="button" id="nextBtn" class="btn btn-outline-primary float-end btn-sm mt-3">Next</button>
            </div>

            <div id="step2" class="form-step d-none">
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Create Password</label>
                    <input type="password" id="password" name="password" class="form-control rounded-3" placeholder="Create Password">
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="form-label fw-semibold">Re-enter Password</label>
                    <input type="password" id="confirm_password" name="password_confirmation" class="form-control rounded-3" placeholder="Re-enter password" required>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary w-100 py-2">Sign Up</button>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <a href="{{ route('login') }}" class="text-decoration-none text-primary">Already have an account?</a>
                </div>
                <button type="button" id="prevBtn" class="btn btn-outline-primary btn-sm mt-3 ">Back</button>

            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");
        const step1 = document.getElementById("step1");
        const step2 = document.getElementById("step2");
        const form = document.getElementById("signupForm");

        // Show Step 2 and Hide Step 1
        nextBtn.addEventListener('click', () => {
            step1.classList.add('d-none');
            step2.classList.remove('d-none');
        })

        // Show Step 1 and Hide Step 2
        prevBtn.addEventListener('click', () => {
            step2.classList.add('d-none');
            step1.classList.remove('d-none');
        })

        // Form 
        form.addEventListener('submit', (event) => {
            const password = document.getElementById('password').value.trim();
            const confirm_password = document.getElementById('confirm_password').value.trim();

            if (password.length < 6) {
                event.preventDefault();
                alert("Password must be at least 6 characters long.");
                return;
            }

            if (password !== confirm_password) {
                event.preventDefault();
                alert("Passwords do not match. Please try again.");
                return;
            }
        })
    });
</script>
@endsection