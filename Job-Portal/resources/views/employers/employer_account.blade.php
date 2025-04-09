@extends('layouts.app')

@section('page-class', 'content-margin-employer')

<!-- Header -->
@include('employers.components.header')

@section('content')
<div class="container mt-5 pb-5 position-relative">
    <!-- Cover Image -->
    <div class="position-relative pt-2 pt-sm-3 pt-md-4 pt-lg-5 ">
        @php
        $coverImage = $employer->cover_image
        ? 'storage/covers/'.$employer->cover_image
        : 'https://static.vecteezy.com/system/resources/previews/004/708/955/non_2x/paper-layer-blue-abstract-background-use-for-banner-cover-poster-wallpaper-design-with-space-for-text-vector.jpg';
        @endphp

        <div class="cover-container" style="background-image: url('{{ asset($coverImage) }}'); background-repeat: no-repeat; background-position: center center; background-size: cover; max-height: 450px; width:100%">
            <!-- Edit Cover Button -->
            <button type="button" class="btn btn-light position-absolute bottom-0 end-0 m-3 rounded-circle shadow-sm" data-bs-toggle="modal" data-bs-target="#companyCoverModal">
                <i class="bi bi-pencil-square"></i>
            </button>
            <!-- Company Logo -->
            <button type="button" class="btn rounded-circle" data-bs-toggle="modal" data-bs-target="#companyIcon">
                <img src="{{ $employer->profile_image ? asset('storage/logos/'.$employer->profile_image) : 'https://media.licdn.com/dms/image/D4E12AQFuCmxN72C2yQ/article-cover_image-shrink_720_1280/0/1702503196049?e=2147483647&v=beta&t=9HHff4rJDnxuWrqfzPqX9j2dncDBKQeShXf2Wt5nrUc' }}"
                    alt="Company Logo"
                    class="img-fluid company-logo rounded-circle border border-white shadow-lg"
                    style=" object-fit:cover;">
            </button>
        </div>
    </div>

    <!-- Company Profile Section -->
    <div class="card border-0  p-3 p-md-4 mt-2 bg-light position-relative">
        <button type="button" class="btn btn-light position-absolute bottom-0 end-0 m-3 rounded-circle shadow-sm" data-bs-toggle="modal" data-bs-target="#companyProfileModal">
            <i class="bi bi-pencil-square"></i>
        </button>
        <div class="justify-content-around  ">
            <h2 class="fw-bold text-black fs-5-half fs-md-5">{{$employer->company_name}}</h2>
            <div class="d-flex flex-column mb-2  flex-md-row font-xs fs-sm-6 justify-content-start gap-md-3">
                <p class="text-muted m-0"><strong>Industry:</strong> {{ ucfirst($employer->industry_sector)}}</p>
                <p class="text-muted m-0"><strong>Location:</strong> {{$employer->company_address}} </p>
                <p class="text-muted m-0"><strong>Website:</strong> <a href="{{'https://'. $employer->company_website }}" target="_blank" rel="noopener noreferrer" class="text-decoration-none">{{$employer->company_website}}</a></p>
            </div>

            @if(!empty($employer->about))
            <p class="description text-muted pt-4 font-sm">
                {{$employer->about}}
            </p>
            @else
            <p class="pt-4 font-sm text-decoration-none text-primary">Add short description about your company.</p>
            @endif
        </div>
    </div>

    <!-- Post Job, Delete and logout button -->
    <div class="d-flex gap-3 mt-3 bg-light rounded-pill p-3">
        <button type="button" class="btn btn-sm btn-primary rounded-pill px-4 py-2 shadow" data-bs-toggle="modal" data-bs-target="#postJobModal">
            Post Job
        </button>
        <form class="shadow rounded-pill" action="{{ route('employer.logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger rounded-pill px-4 py-2">Logout</button>
        </form>
        <form class="shadow rounded-pill" action="{{ route('employer.delete') }}" method="POST" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-4 py-2">Delete Account</button>
        </form>
    </div>

    <!-- Job Listings Section -->
    <div class="mt-4 mt-md-5 position-relative p-3">
        <h2 class="fw-bold fs-md-xs mb-3 fs-5-half">Current Job Openings</h2>

        @forelse ($employer->postedJobs as $job)
        <div class="card shadow-sm p-3 mb-3">
            <h5 class="fw-bold fs-5-half ">{{ $job->job_title }}</h5>
            <p class="text-muted mb-1"><i class="bi bi-geo-alt"></i> {{ $job->location }}</p>
            <p class="font-sm text-muted">{{ Str::limit($job->description, 140) }}</p>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('employer.applications', $job->id)}}">
                    <button class="btn btn-outline-primary btn-sm">
                        Applied Users
                    </button>
                </a>
                <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editJobModal-{{$job->id}}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <!-- Delete Button -->
                <form action="{{ route('job.delete', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="submit">
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </form>
            </div>
            @include('employers.components.edit_job')
        </div>
        @empty
        <p class="text-muted">No job postings yet.</p>
        @endforelse

    </div>


    <!-- Edit / Upload Company cover image -->
    <div class="modal fade" id="companyCoverModal" tabindex="-1" aria-labelledby="companyCoverModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('employer.cover-image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title font-sm fs-md-5" id="companyCoverModalLabel">Upload Cover Image</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-column align-items-center gap-4">
                        <img id="coverImagePreview" src="{{ asset($coverImage) }}" alt="Cover image" class="shadow-sm cover-img img-fluid rounded" style="max-height: 250px;">
                        <div class="input-group mb-3">
                            <input type="file" name="cover_image" class="form-control" id="coverImageInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit / Upload Company logo -->
    <div class="modal fade" id="companyIcon" tabindex="-1" aria-labelledby="companyIconModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('employer.logo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title font-sm fs-md-5" id="companyIconModalLabel">Upload Company Logo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-column align-items-center gap-4">
                        <img id="logoPreview" src="{{ $employer->profile_image ? asset('storage/logos/'.$employer->profile_image) : 'https://media.licdn.com/dms/image/D4E12AQFuCmxN72C2yQ/article-cover_image-shrink_720_1280/0/1702503196049?e=2147483647&v=beta&t=9HHff4rJDnxuWrqfzPqX9j2dncDBKQeShXf2Wt5nrUc' }}" alt="Company logo" class="shadow-sm img-fluid rounded-circle" style="height: 120px; width: 120px; object-fit: cover;">
                        <div class="input-group mb-3">
                            <input type="file" name="logo" class="form-control" id="logoInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Company Info (Location, Website, About) -->
    <div class="modal fade" id="companyProfileModal" tabindex="-1" aria-labelledby="companyProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form action="{{ route('employer.update-profile') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title font-sm fs-md-5" id="companyProfileModalLabel">Update Company Profile Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-column gap-4">
                        <div class="form-group">
                            <label for="company_address" class="form-label">Location</label>
                            <input type="text" class="form-control" name="company_address" value="{{ old('company_address', $employer->company_address) }}">
                        </div>

                        <div class="form-group">
                            <label for="company_website" class="form-label">Website</label>
                            <input type="text" class="form-control" name="company_website" value="{{ old('company_website', $employer->company_website) }}">
                        </div>

                        <div class="form-group">
                            <label for="about" class="form-label">About</label>
                            <textarea name="about" class="form-control" rows="5">{{ old('about', $employer->about) }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@include('employers.components.post_job')
@endsection

@push('scripts')
<script>
    // Cover Image Preview
    document.getElementById('coverImageInput')?.addEventListener('change', function(e) {
        const [file] = e.target.files;
        if (file) {
            document.getElementById('coverImagePreview').src = URL.createObjectURL(file);
        }
    });

    // Logo Image Preview
    document.getElementById('logoInput')?.addEventListener('change', function(e) {
        const [file] = e.target.files;
        if (file) {
            document.getElementById('logoPreview').src = URL.createObjectURL(file);
        }
    });
</script>
@endpush