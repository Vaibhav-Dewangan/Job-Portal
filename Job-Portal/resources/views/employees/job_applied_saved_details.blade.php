@extends('layouts.app')

@section('page-class', 'content-margin-home')

<!-- Header -->
@include('employees.components.header')

@section('content')
<div class="container py-4 mb-3" style="max-width: 993px;">
    <!-- Job Main Section -->
    <div class="mt-4" data-id="$job->id">
        <p class="fs-3 fw-bold m-0 ">{{ $job->job_title }}</p>

        <!-- Company Name & Address -->
        <div class="my-3 d-flex flex-column gap-1">
            <a href="" class="m-0 fs-5-half text-dark-emphasis ">{{ $job->company_name }}</a>
            <p class="m-0">{{ $job->location }}</p>
            <a href="{{'https://'.$job->company_website}}" target="_blank" class="text-decoration-none">{{ $job->company_website }}</a>
            <span class="fs-5-half ">
                <i class="bi bi-currency-rupee"></i>{{ number_format($job->min_salary) }} -
                <i class="bi bi-currency-rupee"></i>{{ number_format($job->max_salary) }} a year
            </span>
        </div>

        <!-- Buttons -->
        <div class="d-flex gap-3">
            @if(Auth::check())
            @if(Auth::user()->applications->contains('posted_job_id', $job->id))
            <!-- Apply Button -->
            <button class="btn btn-primary active">
                Applied
            </button>
            @else
            <!-- Apply Button -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal-{{$job->id}}">
                Apply
            </button>
            @endif

            @if(Auth::user()->savedJobs->contains('posted_job_id', $job->id))
            <!-- Unsave Job -->
            <form action="{{ route('job.unsave', $job->id) }}" method="POST" class="d-inline save-job-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn bg-light-gray" title="Unsave Job">
                    <i class="bi bi-bookmark-fill"></i>
                </button>
            </form>
            @else
            <!-- Save Job -->
            <form action="{{ route('job.save', $job->id) }}" method="POST" class="d-inline save-job-form">
                @csrf
                <button type="submit" class="btn bg-light-gray" title="Save Job">
                    <i class="bi bi-bookmark"></i>
                </button>
            </form>
            @endif
            @else
            <!-- Not Logged In: Redirect to Sign In -->
            <a href="{{ route('login') }}" class="btn btn-primary">Apply</a>
            <a href="{{ route('login') }}" class="btn bg-light-gray" title="Login to Save Job">
                <i class="bi bi-bookmark"></i>
            </a>
            @endif
        </div>


        <hr>

        <!-- Job Details -->
        <section class="">
            <div>
                <p class="fs-5 fw-bold m-0 ">Job Details</p>

                <div class="my-3 d-flex flex-column gap-3 fw-bold text-dark-emphasis">
                    <!-- Pay -->
                    <div class="d-flex gap-3">
                        <i class="bi bi-cash-stack"></i>
                        <div>
                            <p class="small text-tertiary m-0 mb-1">Pay</p>
                            <span class="bg-light-gray small fw-medium rounded px-3 py-1 content-width">
                                <i class="bi bi-currency-rupee"></i>{{ number_format($job->min_salary) }} -
                                <i class="bi bi-currency-rupee"></i>{{ number_format($job->max_salary) }} a year
                            </span>
                        </div>
                    </div>

                    <!-- Job Type -->
                    <div class="d-flex gap-3">
                        <i class="bi bi-briefcase-fill"></i>
                        <div>
                            <p class="small text-tertiary m-0 mb-1">Job type</p>
                            <span class="bg-light-gray small fw-medium rounded px-3 py-1 content-width">
                                {{ $job->job_type }}
                            </span>
                        </div>
                    </div>

                    <!-- Shift and Schedule -->
                    <div class="d-flex gap-3">
                        <i class="bi bi-clock-fill"></i>
                        <div>
                            <p class="small text-tertiary m-0 mb-1">Shift and schedule</p>
                            <div class="d-flex gap-2">
                                @foreach($job->schedule as $shift)
                                @if(trim($shift) !== '')
                                <span class="bg-light-gray small fw-medium rounded px-3 py-1 content-width">
                                    {{ trim($shift) }}
                                </span>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Location -->
            <div>
                <p class="fs-5 fw-bold m-0 ">Location</p>
                <p class="my-2"><i class="bi bi-geo-alt-fill"></i> <span class="px-2">{{ $job->location }}</span></p>
            </div>

            <hr>

            <!-- Full Job Description -->
            <div>
                <p class="fs-5 fw-bold m-0 ">Full job description</p>
                <p class="my-2 fs-5-half fw-semibold text-dark-emphasis">{{ $job->job_title }}</p>

                <!-- Summary -->
                <div>
                    <p class="my-2 fs-5-half fw-semibold text-dark-emphasis">Summary:</p>
                    <p class="my-3 text-secondary">{{ $job->description }}</p>
                </div>

                <!-- Responsibilities -->
                <div>
                    <p class="my-2 fs-5-half fw-semibold text-dark-emphasis">Responsibilities:</p>
                    <ul class="my-3 text-secondary">
                        @foreach(explode('.', $job->responsibilities) as $item)
                        @if(trim($item) !== '')
                        <li>{{ trim($item) }}</li>
                        @endif
                        @endforeach
                    </ul>
                </div>

                <!-- Qualifications -->
                <div>
                    <p class="my-2 fs-5-half fw-semibold text-dark-emphasis">Qualifications:</p>
                    <ul class="my-3 text-secondary">
                        @foreach(explode('.', $job->qualifications) as $item)
                        @if(trim($item) !== '')
                        <li>{{ trim($item) }}</li>
                        @endif
                        @endforeach
                    </ul>
                </div>

                <!-- Benefits -->
                @if(!empty($job->benefits))
                <div>
                    <p class="my-2 fs-5-half fw-semibold text-dark-emphasis">Benefits:</p>
                    <ul class="my-3 text-secondary">
                        @foreach(explode('.', $job->benefits) as $item)
                        @if(trim($item) !== '')
                        <li>{{ trim($item) }}</li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Other Details -->
                <div class="text-secondary">
                    <p class="my-1">Job Types: {{ $job->job_type }}</p>
                    <p class="my-1">Contract length: {{ $job->contract_length ?? 'N/A' }}</p>
                    <p class="my-3">Pay: ₹{{ number_format($job->min_salary) }} - ₹{{ number_format($job->max_salary) }} per year</p>

                    <!-- Schedule List -->
                    <div>
                        <p class="my-3">Schedule:</p>
                        <ul class="my-2">
                            @foreach($job->schedule as $item)
                            @if(trim($item) !== '')
                            <li>{{ trim($item) }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- Experience -->
                    <div class="mb-2">
                        <p class="my-3">Experience:</p>
                        <ul class="my-2">
                            <li>{{ $job->experience ?? 'Not specified' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
@endsection