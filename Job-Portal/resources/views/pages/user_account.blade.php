@extends('layouts.app')

@section('page-class', 'content-margin-home')

@section('content')

<div class="container user-acc-container ">
    <div class="p-2 p-sm-4 ">
        <div class="d-flex gap-4 flex-column align-items-center mb-4">
            <div class=" image-name d-flex justify-content-between" style="width: 100%;">
                <h1 class="m-0 fs-4 fs-sm-2 fs-md-1">Vaibhav Dewangan</h1>
                <button type="button" class="btn rounded-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="Profile Picture" class="rounded-circle shadow-sm profile-img">
                </button>
                <!-- Edit / Upload Profile Picture -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title font-sm fs-md-5" id="exampleModalLabel">Upload Profile Picture</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex flex-column align-items-center gap-4">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="Profile Picture" class="rounded-circle shadow-sm profile-img">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" style="width: 100%;">
                <p class="text-muted m-0"><i class="bi me-3 bi-envelope-fill"></i>vaibhavdewadummy@gmail.com</p>
                <p class="text-muted m-0"><i class="bi me-3 bi-telephone-fill"></i>9999999999</p>
                <p class="text-muted m-0"><i class="bi me-3 bi-geo-alt-fill"></i>India, 49000, IN</p>
            </div>

            <div class=" d-flex justify-content-start align-items-center gap-2 gap-sm-3" style="width: 100%;">
                <button class="btn btn-sm btn-light border-secondary">Edit Profile</button>
                <button type="button" class="btn btn-light btn-sm border-secondary" data-bs-toggle="modal" data-bs-target="#postJobModal">
                    Post a free job
                </button>
                @include('components.post_job')
            </div>

        </div>

        <div class="mb-4">
            <h5 class="fw-bold mb-lg-3">Resume</h5>
            <div class="d-flex justify-content-between align-items-center rounded-3 border p-2 px-sm-3 p-lg-3">
                <div>
                    <p class="m-0 text-truncate">VaibhavDewangan_Resume.pdf</p>
                    <small class="text-muted">Added Nov 20, 2024</small>
                </div>
                <a href="#" class="btn btn-outline-primary btn-sm">View PDF</a>
            </div>
        </div>

        <hr>

        <div>
            <h5 class="fw-bold">Qualifications</h5>
            <p>Highlight your skills and experience.</p>
            <ul class="list-group list-group-flush ">
                <li class="list-group-item">Expert in Web Development</li>
                <li class="list-group-item">Proficient in Laravel and Bootstrap</li>
                <li class="list-group-item">Strong problem-solving skills</li>
            </ul>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            <button class="btn btn-primary">Edit Profile</button>
        </div>
    </div>
</div>

@endsection