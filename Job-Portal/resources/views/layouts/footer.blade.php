<footer class="bg-dark text-white py-5 ">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-sm-4">
                <h5 class="footer-headings">About Us</h5>
                <p class="footer-para">{{config('app.name')}} is your go-to platform for job opportunities and career growth.</p>
            </div>

            <!-- Quick Links -->
            <div class="col-sm-4">
                <h5 class="footer-headings">Quick Links</h5>
                <ul class="list-unstyled footer-quick-links">
                    <li class="pb-2"><a href="{{ route('home') }}" class="text-white text-decoration-none ">Home</a></li>
                    <li class="pb-2"><a href="{{ route('jobs') }}" class="text-white text-decoration-none ">Jobs</a></li>
                    <!-- <li class="pb-2"><a href="{{ route('companies') }}" class="text-white text-decoration-none ">Companies</a></li> -->
                    <li class="pb-2"><a href="{{ route('employer.dashboard') }}" class="text-white text-decoration-none ">Employer/Post Job</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="col-sm-4 ">
                <h5 class="footer-headings">Follow Us</h5>
                <a href="https://www.facebook.com" target="_blank" class="text-white footer-icon me-3"><i class="bi bi-facebook"></i></a>
                <a href="https://www.twitter.com" target="_blank" class="text-white footer-icon me-3"><i class="bi bi-twitter"></i></a>
                <a href="https://www.instagram.com" target="_blank" class="text-white footer-icon me-3"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com" target="_blank" class="text-white footer-icon"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-3">
            <p class="mb-0 footer-para">&copy; {{ date('Y') }} {{config('app.name')}}. All rights reserved.</p>
        </div>
    </div>
</footer>