@extends('layouts.app')

@section('hide-footer', 'd-md-none ')
@section('page-class', 'content-margin')

<!-- Header -->
@include('employees.components.header')

@section('content')
<div class="container homepage width justify-content-center">

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Search -->
    <section class="container-fluid search-section my-4 ">
        <form action="{{ route('jobs') }}" method="GET"
            class="d-flex flex-column flex-md-row align-middle" role="search">
            <input name="job_title" class="form-control mb-2 mb-md-0 me-md-2 py-md-3 shadow-md border-2 border-md-3" type="search" placeholder="Job title" aria-label="Search">
            <input name="location" class="form-control mb-3 mb-md-0 me-md-3 py-md-3 shadow-md border-2 border-md-3 " type="search" placeholder="City, State" aria-label="City">
            <button class="btn search-btn bg-primary mt-2 mt-md-0 py-md-3 shadow-md  text-white fw-semibold" type="submit">Find jobs</button>
        </form>
    </section>

    <!-- Jobs -->
    <div class="row">

        <section class="col-md overflow-y-auto">

            <div class="mx-4 border-3 border-bottom py-2 ">

                <p>
                    <span class="text-black font-sm fw-semibold">Find your next job on {{config('app.name')}}!
                </p>

            </div>

            <!-- Searched text -->
            <div class="mx-4 my-4">
                <p class="font-xs">web developer jobs in Raipur Chhattisgarh</p>
            </div>

            <!-- Job Card -->
            @foreach($jobs as $job)
            @include('employees.components.job_card',[
            'job_id' => $job->id,
            'job_title' => $job->job_title,
            'company_name' => $job->company_name,
            'location' => $job->location,
            'min_salary' => $job->min_salary,
            'max_salary' => $job->max_salary,
            'job_type' => $job->job_type,
            'schedule' => $job->schedule,
            'jobDescriptions' => explode(".", $job->description),
            'is_active' => $loop->first,
            ])
            @endforeach

        </section>
        <section id="job_detail_card" class="col-md border rounded d-none d-md-block bg-white position-sticky " style="top: 87px; height: 85vh">

            @if($jobs->count())
            @include('employees.components.job_card_indepth', ['job' => $jobs->first()])
            @endif
        </section>
    </div>

</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.job-card');

        cards.forEach(card => {
            card.addEventListener('click', function() {
                const jobId = card.getAttribute('data-id');
                if (window.innerWidth <= 768) {
                    const url = card.getAttribute('data-url');
                    if (url) window.location.href = url;
                } else {

                    // Remove active class from all
                    cards.forEach(card => card.classList.remove('active'));

                    // Add to selected
                    card.classList.add('active');

                    fetch(`/employee/job-detail/${jobId}`)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('job_detail_card').innerHTML = html;
                        })
                        .catch(error => console.error('Error loading job details:', error));
                }
            });
        });

        // Handle resume preview
        document.querySelectorAll('.resume-input').forEach(input => {
            input.addEventListener('change', function() {
                const jobId = this.id.split('-').pop();
                const file = this.files[0];
                const previewDiv = document.getElementById(`resume-preview-${jobId}`);
                const frame = document.getElementById(`resume-frame-${jobId}`);

                if (file && file.type === "application/pdf") {
                    const fileURL = URL.createObjectURL(file);
                    frame.src = fileURL;
                    previewDiv.classList.remove('d-none');
                } else {
                    frame.src = '';
                    previewDiv.classList.add('d-none');
                }
            });
        });
    });
</script>
@endpush