@extends('layouts.app')

@section('page-class', 'content-margin-home')

<!-- Header -->
@include('employees.components.header')

@section('content')

<div class="container user-acc-container position-relative ">
    <div class="p-2 p-sm-4 ">
        <div class="d-flex gap-4 flex-column align-items-center mb-4">
            <div class=" image-name d-flex justify-content-between" style="width: 100%;">
                <h1 class="m-0 fs-4 fs-sm-2 fs-md-1">{{$user->name}}</h1>
                @php
                $profile_img = $user->profile_image ?
                asset('storage/user-profile-img/'. $user->profile_image) :
                'https://static.vecteezy.com/system/resources/thumbnails/005/005/788/small/user-icon-in-trendy-flat-style-isolated-on-grey-background-user-symbol-for-your-web-site-design-logo-app-ui-illustration-eps10-free-vector.jpg'
                @endphp
                <button type="button" class="btn rounded-circle" data-bs-toggle="modal" data-bs-target="#userIcon">
                    <img src="{{$profile_img}}" alt="Profile Picture" class="rounded-circle shadow-sm profile-img">
                </button>
            </div>
            <div class="" style="width: 100%;">
                <p class="text-muted m-0"><i class="bi me-3 bi-envelope-fill"></i>{{$user->email}}</p>
                <div>
                    @if(!empty($user->contact))
                    <p class="text-muted m-0"><i class="bi me-3 bi-telephone-fill"></i>{{$user->contact}}</p>
                    @else
                    <a href="#" class="text-decoration-none m-0"><i class="bi me-3 text-muted bi-telephone-fill"></i>Add Contact</a>
                    @endif
                </div>
                <div>
                    @if(!empty($user->location))
                    <p class="text-muted m-0"><i class="bi me-3 bi-telephone-fill"></i>{{$user->location}}</p>
                    @else
                    <a href="#" class="text-decoration-none m-0"><i class="bi me-3 text-muted bi-telephone-fill"></i>Add Location</a>
                    @endif
                </div>
            </div>

            <div class=" d-flex justify-content-start align-items-center gap-2 gap-sm-3" style="width: 100%;">
                <!-- edit -->
                <button class="btn btn-sm btn-primary rounded-pill " data-bs-toggle="modal" data-bs-target="#userProfileModal">
                    Edit Profile
                </button>
                <!-- logout -->
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn  btn-sm btn-danger rounded-pill">Logout</button>
                </form>

                <form class="rounded-pill" action="{{ route('user.delete') }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill  ">Delete Account</button>
                </form>

            </div>

        </div>
        <hr>
        <!-- Saved Jobs -->
        <h5 class="my-4">Saved Jobs</h5>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @forelse ($savedJobs as $saved)
            <div class="col">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $saved->job->job_title }}</h5>
                        <p class="card-text text-muted mb-1">{{ $saved->job->company_name }}</p>
                        <p class="card-text"><i class="bi bi-geo-alt-fill me-2"></i>{{ $saved->job->location }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('job.show.saved-applied',['for' => 'saved', 'id' => $saved->job->id]) }}" class="btn btn-sm btn-outline-primary">View Job</a>

                            <!-- Unsave form -->
                            <form action="{{ route('job.unsave', $saved->job->id) }}" method="POST" onsubmit="return confirm('Remove this job from saved?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Unsave</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-muted">You have no saved jobs.</p>
            @endforelse
        </div>


        <hr>

        <!-- Applied jobs -->
        <h5 class=" my-4">Applied Jobs</h5>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @forelse ($appliedJobs as $applied)
            <div class="col">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $applied->job->job_title }}</h5>
                        <p class="card-text text-muted mb-1">{{ $applied->job->company_name }}</p>
                        <p class="card-text"><i class="bi bi-geo-alt-fill me-2"></i>{{ $applied->job->location }}</p>
                        <a href="{{ route('job.show.saved-applied',['for' => 'applied', 'id' => $applied->job->id]) }}" class="btn btn-sm btn-outline-success">View Job</a>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-muted">You haven’t applied to any jobs yet.</p>
            @endforelse
        </div>

    </div>

    <!-- floating logout button -->
    <div class="position-fixed bottom-0 d-none d-md-block rounded-pill end-0 m-3 m-md-4 m-lg-5 shadow">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-md btn-danger rounded-pill px-4 py-2">Logout</button>
        </form>
    </div>

    <!-- Edit / Upload Profile Picture -->
    <div class="modal fade" id="userIcon" tabindex="-1" aria-labelledby="userIconModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('employee.logo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title font-sm fs-md-5" id="userIconModalLabel">Upload Profile Picture</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-column align-items-center gap-4">
                        <img id="profile_img_preview" src="{{$profile_img}}" alt="Profile Picture" class="shadow-sm img-fluid profile_img rounded-circle" style="height: 120px; width: 120px; object-fit: cover;">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="profile_image" id="profileLogoInput">
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

    <!-- Edit User Info (Location, Name, Contact, Email) -->
    <div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form action="{{ route('employee.update-profile') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h1 class="modal-title font-sm fs-md-5" id="userProfileModalLabel">Update Profile Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-column gap-4">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email id</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" class="form-control" name="contact" value="{{ old('contact', $user->contact) }}">
                        </div>

                        <div class="form-group">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" value="{{ old('location', $user->location) }}">
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
@endsection

@push('scripts')
<script>
    // Logo Image Preview
    document.getElementById('profileLogoInput')?.addEventListener('change', function(e) {
        const [file] = e.target.files;
        if (file) {
            document.getElementById('profile_img_preview').src = URL.createObjectURL(file);
        }
    });
</script>
@endpush