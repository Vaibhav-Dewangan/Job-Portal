@extends('layouts.app')

@section('page-class', 'content-margin-home')

@section('content')
<div class="home-container " style="min-height: 90vh;">
    <!-- Hero Section -->
    <div class="text-white text-center hero-section d-flex align-items-center justify-content-center">

        <div class="container d-none d-sm-block"> <!-- visible only on sm+ -->
            <h1 class="display-4 fw-bold text-secondary ">Find Your Dream Job</h1>
            <p class="lead text-secondary">Connecting you with top companies and opportunities</p>
            <a href="{{ route('jobs') }}" class="btn btn-light btn-lg mt-3 border-secondary shadow">Get Started</a>
        </div>

        <div class="container d-sm-none"> <!-- visible only below sm -->
            <h1 class="display-6 fw-bold text-secondary">Find Your Dream Job</h1>
            <p class="lead fs-5-half text-secondary">Connecting you with top companies and opportunities</p>
            <a href="{{ route('jobs') }}" class="btn btn-light btn-md mt-3 border-secondary shadow">Get Started</a>
        </div>
    </div>

    <!-- Features Section -->
    <section class="container position-relative text-center my-2 my-sm-5 d-flex justify-content-center ">
        <div class="row feature-position mx-auto bg-light rounded-5 px-2 py-4 px-md-3 py-md-4 px-lg-4 py-lg-5 shadow-lg">
            <div class="col-sm-4">
                <i class="bi bi-briefcase-fill display-6 text-secondary"></i>
                <h4 class="mt-3 d-none d-lg-block ">Top Companies</h4>
                <h6 class="mt-3 d-lg-none ">Top Companies</h6>
                <p class="d-none d-lg-block ">Find jobs from the best employers in the industry.</p>
                <p class="small d-lg-none ">Find jobs from the best employers in the industry.</p>
            </div>
            <div class="col-sm-4 ">
                <i class="bi bi-search display-6 text-secondary"></i>
                <h4 class="mt-3 d-none d-lg-block ">Smart Search</h4>
                <h6 class="mt-3 d-lg-none ">Smart Search</h6>
                <p class="d-none d-lg-block">Use our search filters to find the perfect job.</p>
                <p class="small d-lg-none">Use our search filters to find the perfect job.</p>
            </div>
            <div class="col-sm-4">
                <i class="bi bi-person-check-fill display-6 text-secondary"></i>
                <h4 class="mt-3 d-none d-lg-block ">Easy Apply</h4>
                <h6 class="mt-3 d-lg-none ">Easy Apply</h6>
                <p class="d-none d-lg-block">Apply for jobs in just a few clicks.</p>
                <p class="small d-lg-none">Apply for jobs in just a few clicks.</p>
            </div>
        </div>
    </section>
</div>
@endsection