@extends('layouts.app')

@section('page-class', 'content-margin')
@section('hide-footer', 'd-none')

@section('content')

<!-- Header -->
@include('Employers.components.header')

<div class="mx-auto login-form p-4 p-sm-0 pt-5 pt-lg-4">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="max-width: 400px; margin: auto;">
        <div class="mb-3 text-center">
            <h2 class="fw-bold text-primary">Sign Up</h2>
        </div>
        <form id="employerSignupForm" action="{{ route('employer.register.store') }}" method="post">
            @csrf
            {{-- Step 1 --}}
            <div id="step1" class="form-step">
                <div class="mb-3">
                    <label for="company_name" class="form-label fw-semibold">Company Name</label>
                    <input type="text" class="form-control rounded-3" name="company_name" id="company_name" placeholder="Enter company name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" class="form-control rounded-3" name="email" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="user_type" class="form-label text-body-emphasis">User Type</label>
                    <select class="form-select" name="user_type" id="user_type">
                        <option value="Employer">Employer</option>
                    </select>
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <a href="{{ route('employer.login') }}" class="small text-primary">Already have an account?</a>
                </div>

                <button type="button" id="nextBtn1" class="btn btn-outline-primary float-end btn-sm mt-3">Next</button>
            </div>

            {{-- Step 2 --}}
            <div id="step2" class="form-step d-none">
                <div class="mb-3">
                    <label for="company_address" class="form-label fw-semibold">Company Address</label>
                    <input type="text" class="form-control rounded-3" name="company_address" id="company_address" placeholder="Enter company address">
                </div>
                <div class="mb-3">
                    <label for="full_name" class="form-label fw-semibold">Full Name</label>
                    <input type="text" class="form-control rounded-3" name="full_name" id="full_name" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="industry_sector" class="form-label text-body-emphasis">Industry Sector</label>
                    <select class="form-select" name="industry_sector" id="industry_sector">
                        <option value="" >Select Industry</option>
                        <option value="information technology">Information Technology (IT)</option>
                        <option value="healthcare">Healthcare & Medical</option>
                        <option value="finance">Finance & Banking</option>
                        <option value="education">Education & Training</option>
                        <option value="construction">Construction & Engineering</option>
                        <option value="marketing">Marketing & Advertising</option>
                    </select>
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <a href="{{ route('employer.login') }}" class="small text-primary">Already have an account?</a>
                </div>

                <button type="button" id="prevBtn1" class="btn btn-outline-primary btn-sm mt-3">Back</button>
                <button type="button" id="nextBtn2" class="btn btn-outline-primary float-end btn-sm mt-3">Next</button>
            </div>

            {{-- Step 3 --}}
            <div id="step3" class="form-step d-none">
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
                    <a href="{{ route('employer.login') }}" class="text-decoration-none text-primary">Already have an account?</a>
                </div>
                <button type="button" id="prevBtn2" class="btn btn-outline-primary btn-sm mt-3">Back</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const nextBtn1 = document.getElementById("nextBtn1");
        const nextBtn2 = document.getElementById("nextBtn2");
        const prevBtn1 = document.getElementById("prevBtn1");
        const prevBtn2 = document.getElementById("prevBtn2");
        const step1 = document.getElementById("step1");
        const step2 = document.getElementById("step2");
        const step3 = document.getElementById("step3");
        const form = document.getElementById("employerSignupForm");

        function validateStep1() {
            const companyName = document.getElementById("company_name").value.trim();
            const email = document.getElementById("email").value.trim();

            if (companyName === "") {
                alert("Company name is required.");
                return false;
            }
            if (email === "") {
                alert("Email is required");
                return false;
            }
            return true;
        }

        function validateStep2() {
            const companyAddress = document.getElementById("company_address").value.trim();
            const fullName = document.getElementById("full_name").value.trim();
            const industrySector = document.getElementById("industry_sector").value;

            if (companyAddress === "") {
                alert("Company address is required.");
                return false;
            }
            if (fullName === "") {
                alert("Full name is required.");
                return false;
            }
            if (industry_sector === "") {
                alert("Please select an industry sector.");
                return false;
            }
            return true;
        }

        nextBtn1.addEventListener('click', () => {
            if (validateStep1()) {
                step1.classList.add('d-none');
                step2.classList.remove('d-none');
            }
        });

        prevBtn1.addEventListener('click', () => {
            step2.classList.add('d-none');
            step1.classList.remove('d-none');
        });

        nextBtn2.addEventListener('click', () => {
            if (validateStep2()) {
                step2.classList.add('d-none');
                step3.classList.remove('d-none');
            }
        });

        prevBtn2.addEventListener('click', () => {
            step3.classList.add('d-none');
            step2.classList.remove('d-none');
        });

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
        });
    });
</script>
@endpush
