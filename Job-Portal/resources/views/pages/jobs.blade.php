@extends('layouts.app')

@section('hide-footer', 'd-md-none ')
@section('page-class', 'content-margin pb-5')

@section('content')
<div class="container homepage width justify-content-center">

    <!-- Search -->
    <section class="container-fluid search-section my-4 ">
        <form class="d-flex flex-column flex-md-row align-middle" role="search">
            <input class="form-control mb-2 mb-md-0 me-md-2 py-md-3 shadow-md border-2 border-md-3" type="search" placeholder="Job title" aria-label="Search">
            <input class="form-control mb-3 mb-md-0 me-md-3 py-md-3 shadow-md border-2 border-md-3 " type="search" placeholder="City, State" aria-label="City">
            <button class="btn search-btn bg-primary mt-2 mt-md-0 py-md-3 shadow-md  text-white fw-semibold" type="submit">Find jobs</button>
        </form>
    </section>

    <!-- Jobs -->
    <div class="row">

        <section class="col-md overflow-y-auto">

            <!-- Upload Resume -->
            <div class="mx-4 border-3 border-bottom py-2 ">
                <a class="text-decoration-none text-black font-sm fw-semibold" href="">
                    <p>
                        <span class="text-primary">Upload your CV</span> and find your next job on {{config('app.name')}}!
                    </p>
                </a>
            </div>

            <!-- Searched text -->
            <div class="mx-4 my-4">
                <p class="font-xs">web developer jobs in Raipur Chhattisgarh</p>
            </div>

            <!-- Job Card -->
            <!-- foreach($jobs as $job)
            include('components.job_card',[

            'jobTitle' => $job->title,
            'companyName' => $job->company_name,
            'companyAddress' => $job->company_address,
            'salary' => $job->salary,
            'jobType' => $job->type,
            'shift' => $job->shift,
            'jobDescriptions' => explode(',', $job->description)

            ])
            endforeach -->

            <!-- Job Card -->
            <div id="job-card" class="border rounded mx-2 p-3 shadow-sm ">
                <p class="fs-3 fw-semibold m-0 ">Job Profile Name</p>

                <!-- Company Name & Address -->
                <div class="my-3">
                    <p class="m-0">Company Name</p>
                    <p class="m-0">Company Address</p>
                </div>

                <!-- Salary, Shifts & -->
                <div class="my-3 d-flex flex-row flex-wrap gap-2 fw-bold text-dark-emphasis">
                    <span class="bg-light-gray rounded px-2 content-width"><i class="bi bi-currency-rupee"></i>4,80,000 - <i class="bi bi-currency-rupee"></i>5,80,000 a year</span>
                    <span class="bg-light-gray rounded px-2 content-width">Contractual/Tempory</span>
                    <span class="bg-light-gray rounded px-2 content-width">Day Shift</span>
                </div>

                <!-- job Descriptions -->
                <div class="my-3 text-secondary small">
                    <ul>
                        <li>Optimize JVM performance and apply performance enhancement techniques.</li>
                        <li>Manage code repositories using version control systems such as Git, Subversion, or SourceTree.</li>
                    </ul>
                </div>


            </div>
        </section>
        <section class="col-md border rounded d-none d-md-block bg-white position-sticky " style="top: 87px; height: 85vh">

            @include('components.job_card_indepth')

        </section>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const card = document.getElementById('job-card');

        if (card) {
            card.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    const route = "{{ route('job-sm') }}";
                    window.location.href = route;
                }
            });
        }
    });
</script>
@endsection