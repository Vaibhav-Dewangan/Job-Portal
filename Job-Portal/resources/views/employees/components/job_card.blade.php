<div class="job-card border rounded m-2 p-3 shadow-sm {{ $is_active ? 'active' : '' }} " data-id="{{ $job_id }}" data-url="{{ route('job.show', $job_id) }}">

    <p class="fs-3 fw-semibold m-0 ">{{$job_title}}</p>

    <!-- Company Name & Address -->
    <div class="my-3">
        <p class="m-0">{{$company_name}}</p>
        <p class="m-0">{{$location}}</p>
    </div>

    <!-- Salary, Shifts & -->
    <div class="my-3 d-flex flex-row flex-wrap gap-2 fw-bold text-dark-emphasis">
        <span class="bg-light-gray rounded px-2 content-width"><i class="bi bi-currency-rupee"></i>Upto {{ $max_salary }} a year</span>
        <span class="bg-light-gray rounded px-2 content-width">{{ $job_type }}</span>
        @foreach($schedule as $item)
        <span class="bg-light-gray rounded px-2 content-width">{{ $item }}</span>
        @endforeach
    </div>

    <!-- job Descriptions -->
    <div class="my-3 text-secondary small">
        <ul>
            @foreach($jobDescriptions as $desc)
            <li>{{$desc}}</li>
            @endforeach
        </ul>
    </div>

</div>