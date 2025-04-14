@extends('layouts.app')

@section('page-class', 'content-margin-home')
@section('hide-footer', 'd-md-none ')

<!-- Header -->
@include('employees.components.header')

@section('content')
<div class="container mt-4 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow w-md-75 ">
        <div class="card-header p-3">
            <h4>Apply for: {{ $job->job_title }}</h4>
            <p class="mb-0">{{ $job->company_name }} - {{ $job->location }}</p>
        </div>

        <div class="card-body">
            <form action="{{ route('job.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Cover Letter -->
                <div class="mb-3">
                    <label class="form-label">Cover Letter</label>
                    <textarea name="cover_letter" class="form-control" rows="5" required></textarea>
                </div>

                <!-- Resume Upload -->
                <div class="mb-3">
                    <label class="form-label">Upload Resume (PDF)</label>
                    <input type="file" name="resume" accept=".pdf" class="form-control resume-input" required>
                </div>

                <!-- Resume Preview -->
                <div id="resume-preview" class="d-none mb-3">
                    <label class="form-label">Resume Preview:</label>
                    <iframe id="resume-frame" width="100%" height="400px" style="border: 1px solid #ccc;"></iframe>
                </div>

                <button type="submit" class="btn btn-success">Submit Application</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelector('.resume-input').addEventListener('change', function() {
        const file = this.files[0];
        const frame = document.getElementById('resume-frame');
        const preview = document.getElementById('resume-preview');

        if (file && file.type === 'application/pdf') {
            const fileURL = URL.createObjectURL(file);
            frame.src = fileURL;
            preview.classList.remove('d-none');
        } else {
            frame.src = '';
            preview.classList.add('d-none');
        }
    });
</script>
@endpush