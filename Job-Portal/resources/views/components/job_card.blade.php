<div id="job-card" class="border rounded mx-2 p-3 shadow-sm ">
    <p class="fs-3 fw-semibold m-0 ">{{$jobTitle}}</p>

    <!-- Company Name & Address -->
    <div class="my-3">
        <p class="m-0">{{$companyName}}</p>
        <p class="m-0">{{$companyAddress}}</p>
    </div>

    <!-- Salary, Shifts & -->
    <div class="my-3 d-flex flex-row flex-wrap gap-2 fw-bold text-dark-emphasis">
        <span class="bg-light-gray rounded px-2 content-width"><i class="bi bi-currency-rupee"></i>{{ $salary }} a year</span>
        <span class="bg-light-gray rounded px-2 content-width">{{ $jobType }}</span>
        <span class="bg-light-gray rounded px-2 content-width">{{ $shift }}</span>
    </div>

    <!-- job Descriptions -->
    <div class="my-3 text-secondary small">
        <ul>
            @foreach($jobDescriptions as $desc)
            <li>{{$desc}}</li>
            @endforeach
        </ul>
    </div>
   
    <!-- JavaScript -->
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


</div>

