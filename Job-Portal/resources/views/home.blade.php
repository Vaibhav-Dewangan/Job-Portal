@extends('layouts.app')

@section('page-class', 'content-margin-home')

<!-- Header -->
@include('employees.components.header')

@section('content')
<div class="home-container " style="min-height: 90vh;">

    <!-- @if(session('success'))
    <div id="successAlert" class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
    </div>
    @endif -->

    <!-- Hero Section -->
    <div class="text-white text-center hero-section d-flex flex-column align-items-center justify-content-center">

        <div class="container d-none d-sm-block"> <!-- visible only on sm+ -->
            <h1 class="display-4 fw-bold text-secondary ">Find Your Dream Job</h1>
            <p class="lead text-secondary">Connecting you with top companies and opportunities</p>
            @if(Auth::guard('web')->check())
            <p class="m-0 text-primary">Welcome, {{ Auth::guard('web')->user()->name}} !</p>
            @endif
        </div>

        <div class="container d-sm-none"> <!-- visible only below sm -->
            <h1 class="display-6 fw-bold text-secondary">Find Your Dream Job</h1>
            <p class="lead fs-5-half text-secondary">Connecting you with top companies and opportunities</p>
            @if(Auth::guard('web')->check())
            <p class="m-0 text-primary">Welcome, {{ Auth::guard('web')->user()->name}} !</p>
            @endif
        </div>

        <!-- Search -->
        <section class="d-flex search-section my-4 gap-2">
            <form action="{{ route('jobs') }}" method="GET" class="d-flex w-100 gap-2">
                <input
                    name="q"
                    class="form-control py-md-2 py-lg-3 px-md-4 border-primary-subtle shadow-md border-2 border-md-3"
                    type="search"
                    placeholder="Search Job"
                    aria-label="Search"
                    id="searchInput">
                <button
                    class="btn search-btn bg-primary py-md-2 py-lg-3 px-md-4 shadow-md text-white fw-semibold"
                    type="submit"
                    style="max-width: 4rem;">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </section>
    </div>

    <!-- Features Section -->
    <section class="container position-relative text-center my-2 my-sm-5 d-flex justify-content-center ">
        <div class="row feature-position border-start border-5 border-primary  mx-auto bg-light rounded-5 px-2 py-4 px-md-3 py-md-4 px-lg-4 shadow-lg">
            <div class="col-sm-4">
                <i class="bi bi-briefcase-fill display-6 text-secondary"></i>
                <h4 class="mt-3 d-none d-xl-block ">Top Companies</h4>
                <h6 class="mt-3 d-xl-none ">Top Companies</h6>
                <p class="d-none d-xl-block ">Find jobs from the best employers in the industry.</p>
                <p class="small d-xl-none ">Find jobs from the best employers in the industry.</p>
            </div>
            <div class="col-sm-4 ">
                <i class="bi bi-search display-6 text-secondary"></i>
                <h4 class="mt-3 d-none d-xl-block ">Smart Search</h4>
                <h6 class="mt-3 d-xl-none ">Smart Search</h6>
                <p class="d-none d-xl-block">Use our search filters to find the perfect job.</p>
                <p class="small d-xl-none">Use our search filters to find the perfect job.</p>
            </div>
            <div class="col-sm-4">
                <i class="bi bi-person-check-fill display-6 text-secondary"></i>
                <h4 class="mt-3 d-none d-xl-block ">Easy Apply</h4>
                <h6 class="mt-3 d-xl-none ">Easy Apply</h6>
                <p class="d-none d-xl-block">Apply for jobs in just a few clicks.</p>
                <p class="small d-xl-none">Apply for jobs in just a few clicks.</p>
            </div>
        </div>
    </section>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                let alertBox = document.getElementById('successAlert');
                if (alertBox) {
                    alertBox.classList.remove('show');
                    alertBox.classList.add('fade');
                    setTimeout(() => alertBox.remove(), 500);
                }
            }, 2000);
        })
    </script> -->
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('searchInput');
        input.addEventListener('click', function() {
            window.location.href = "{{ route('jobs') }}";
        });
    });
</script>
@endpush