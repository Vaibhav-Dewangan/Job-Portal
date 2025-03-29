@extends('layouts.app')

@section('page-class', 'content-margin')

@section('content')
<div class="container company-page d-flex justify-content-center">
    <div class="mx-2 mx-sm-0 company-page-child">
        <h1 class="fw-bold mb-3 fs-3 fs-sm-2 fs-md-1">Find great places to work</h1>
        <h5 class="text-secondary mb-5 d-none d-md-block">Get access to millions of company reviews</h5>
        <h6 class="text-secondary mb-4 d-md-none">Get access to millions of company reviews</h6>

        <!-- Search Companies -->
        <div class="mb-5">
            <p class="mb-2 fw-bold text-dark-emphasis d-none d-md-block">Company name or job title</p>
            <p class="mb-2 fw-bold text-dark-emphasis d-md-none small">Company name or job title</p>
            <form class="d-flex " role="search">
                <input class="form-control me-2 py-lg-2 shadow-md border-md-3" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary w-25 text-nowrap shadow-md " type="submit"> <span class="d-none d-md-block">Find Companies</span> <i class="bi bi-search d-md-none"></i></button>

            </form>
        </div>

        <!-- Companies Categories -->
        <div class="companies-categories mb-5">
            <h2 class="fw-bold text-dark-emphasis mb-3 mb-lg-4 d-none d-md-block">Browse companies by industry</h2>
            <h4 class="fw-bold text-dark-emphasis mb-3 d-md-none">Browse companies by industry</h4>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="bg-light  comp-category-card mb-2 md-sm-0 rounded-4 border d-flex justify-content-center align-items-center">
                        <p class="m-0">Aerospace & Defense</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="bg-light  comp-category-card mb-2 md-sm-0 rounded-4 border d-flex justify-content-center align-items-center">
                        <p class="m-0">Aerospace & Defense</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="bg-light  comp-category-card mb-2 md-sm-0 rounded-4 border d-flex justify-content-center align-items-center">
                        <p class="m-0">Aerospace & Defense</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="bg-light  comp-category-card mb-2 md-sm-0 rounded-4 border d-flex justify-content-center align-items-center">
                        <p class="m-0">Aerospace & Defense</p>
                    </div>
                </div>


            </div>
        </div>

        <!-- Top Companies -->
        <div class="top-companies mb-5">
            <h2 class="fw-bold text-dark-emphasis mb-3 mb-lg-4 d-none d-md-block">Top Companies</h2>
            <h4 class="fw-bold text-dark-emphasis mb-3 d-md-none">Top Companies</h4>
            <div class="row ">
                <div class="col-sm-6 col-lg-4 mb-3">
                    <div class="justify-content-evenly align-items-center comp-category-card md-sm-0 rounded-4 d-flex">
                        <img class="shadow-sm rounded" src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" alt="" style="height: 50px;">
                        <div>
                            <p class="m-0 text-nowrap">Aerospace & Defense</p>
                            <p class="m-0">⭐⭐⭐⭐</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                <div class="justify-content-evenly align-items-center comp-category-card md-sm-0 rounded-4 d-flex">
                        <img class="shadow-sm rounded" src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" alt="" style="height: 50px;">
                        <div>
                            <p class="m-0 text-nowrap">Aerospace & Defense</p>
                            <p class="m-0">⭐⭐⭐⭐</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                <div class="justify-content-evenly align-items-center comp-category-card md-sm-0 rounded-4 d-flex">
                        <img class="shadow-sm rounded" src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" alt="" style="height: 50px;">
                        <div>
                            <p class="m-0 text-nowrap">Aerospace & Defense</p>
                            <p class="m-0">⭐⭐⭐⭐</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                <div class="justify-content-evenly align-items-center comp-category-card md-sm-0 rounded-4 d-flex">
                        <img class="shadow-sm rounded" src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" alt="" style="height: 50px;">
                        <div>
                            <p class="m-0 text-nowrap">Aerospace & Defense</p>
                            <p class="m-0">⭐⭐⭐⭐</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
@endsection