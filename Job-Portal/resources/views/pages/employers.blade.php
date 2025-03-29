@extends('layouts.app')

@section('page-class', 'content-margin-home')

<!-- Header -->
@section('header-hide','d-none')

@section('header-lg')
<div class="navbar-nav ">
    <a class="nav-link" href="{{ route('hire') }}">Post Job</a>
</div>
<div class="d-flex align-items-center gap-2 ">
    <a class="text-decoration-none text-primary" href="{{ route('signin')}}">Sign in</a>
    <span>|</span>
    <a class="text-decoration-none text-secondary" href="{{ route('user-account')}}"><i class="bi fs-3 px-1 text-secondary bi-person-fill"></i></a>
    <span>|</span>
    <a class="text-decoration-none text-secondary" href="{{ route('home') }}">Find Job</a>
</div>
@endsection

@section('header-max-lg')
<div class="navbar-nav @yield('header-hide') ">
    <a class="nav-link active d-flex justify-content-between align-items-center" href="{{ route('hire') }}">Post Job <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    <a class="nav-link d-flex justify-content-between align-items-center" href="{{ route('home') }}">Find Job <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    <a class="nav-link d-flex justify-content-between align-items-center" href="">Contact Us <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    <a class="nav-link d-flex justify-content-between align-items-center" href="">Help <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
</div>
@endsection

<!-- Content -->
@section('content')
<div class="employer-container " style="min-height: 90vh;">
    <!-- Employer Hero Section -->
    <div class="text-white text-center e-hero-section d-flex align-items-center justify-content-center">

        <div class="container d-none d-sm-block"> <!-- visible only on sm+ -->
            <h1 class="display-5 fw-bold text-secondary ">Let's hire your next great candidate. Fast.</h1>
            <p class="lead text-secondary">Save time and effort in your recruitment journey.</p>
            <button type="button" class="btn btn-light btn-lg mt-3 border-secondary shadow" data-bs-toggle="modal" data-bs-target="#postJobModal">
                Post a free job
            </button>
        </div>

        <div class="container d-sm-none"> <!-- visible only below sm -->
            <h1 class="display-6 fw-bold text-secondary">Let's hire your next great candidate. Fast.</h1>
            <button type="button" class="btn btn-light btn-md mt-3 border-secondary shadow" data-bs-toggle="modal" data-bs-target="#postJobModal">
                Post a free job
            </button>
        </div>

        @include('components.post_job')
    </div>

    <!-- Steps Section -->
    <section class="step-container position-relative text-center mt-2 mt-sm-5 d-flex justify-content-center ">
        <div class="row steps-card-container mx-auto rounded-5 px-2 py-4 px-md-3 py-md-4 px-lg-4 py-lg-5 ">
            <div class="col-md text-start shadow steps-card rounded-4 bg-white border">
                <p class="m-0 text-primary fw-bold">1</p>
                <h4 class="mt-2 d-none d-lg-block text-dark-emphasis ">Create your free account</h4>
                <h6 class="mt-2 d-lg-none ">Create your free account</h6>
                <p class="d-none d-lg-block ">All you need is your email address to create an account and start building your job post.</p>
                <p class="small d-lg-none ">All you need is your email address to create an account and start building your job post.</p>
            </div>
            <div class="col-md text-start shadow steps-card rounded-4 bg-white border ">
                <p class="m-0 text-primary fw-bold">2</p>
                <h4 class="mt-2 d-none text-dark-emphasis d-lg-block ">Build your job post</h4>
                <h6 class="mt-2 d-lg-none ">Build your job post</h6>
                <p class="d-none d-lg-block">Then just add a title, description and location to your job post, and you're ready to go.</p>
                <p class="small d-lg-none">Then just add a title, description and location to your job post, and you're ready to go.</p>
            </div>
            <div class="col-md text-start shadow steps-card rounded-4 bg-white border">
                <div>
                    <p class="m-0 text-primary fw-bold">3</p>
                    <h4 class="mt-2 d-none d-lg-block text-dark-emphasis ">Post your job</h4>
                    <h6 class="mt-2 d-lg-none ">Post your job</h6>
                    <p class="d-none d-lg-block">After you post your job, use our state-of-the-art tools to help you find dream talent.</p>
                    <p class="small d-lg-none">After you post your job, use our state-of-the-art tools to help you find dream talent.</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection