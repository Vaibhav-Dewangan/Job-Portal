<header class="position-fixed top-0 z-3 d-flex align-middle bg-white header-height shadow-sm w-100 px-sm-2 px-md-3 px-lg-4 px-xl-5 ">
    <nav class="navbar navbar-expand-lg bg-body-white w-100">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold">{{config('app.name')}}</a>

            <!-- Mobile View: User Icon + Offcanvas Toggle -->
            <div class="d-lg-none d-flex align-items-center gap-2">
                <a href="{{ route('user-account') }}"><i class="bi fs-2 px-1 text-secondary bi-person-fill"></i></a>
                <a href="{{ route('signin') }}" class="text-decoration-none text-secondary">Sign In</a> <!-- User Icon -->
                <button class="navbar-toggler border-0 px-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <!-- Desktop Navbar (Visible only on `lg+`) -->
            <div class="collapse navbar-collapse d-none d-lg-flex justify-content-between" id="navbarNav">
                @yield('header-lg')
                <div class="navbar-nav @yield('header-hide')">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                    <a class="nav-link" href="{{ route('jobs') }}">Jobs</a>
                    <a class="nav-link" href="{{ route('companies') }}">Companies</a>
                </div>
                <div class="d-flex align-items-center gap-2 @yield('header-hide') ">
                    <a class="text-decoration-none text-primary" href="{{ route('signin')}}">Sign in</a>
                    <span>|</span>
                    <a class="text-decoration-none text-secondary" href="{{ route('user-account')}}"><i class="bi fs-3 px-1 text-secondary bi-person-fill"></i></a>
                    <span>|</span>
                    <a class="text-decoration-none text-secondary" href="{{ route('hire') }}">Employers/Post Job</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Offcanvas Menu (Visible only below `lg`) -->
    <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>signin
        <div class="offcanvas-body">
            @yield('header-max-lg')
            <div class="navbar-nav @yield('header-hide') ">
                <a class="nav-link active d-flex justify-content-between align-items-center" href="{{ route('home') }}">Home <i class="bi bi-chevron-right"></i></a>
                <hr class="my-1">
                <a class="nav-link d-flex justify-content-between align-items-center" href="{{ route('jobs') }}">Jobs <i class="bi bi-chevron-right"></i></a>
                <hr class="my-1">
                <a class="nav-link d-flex justify-content-between align-items-center" href="{{ route('companies') }}">Companies <i class="bi bi-chevron-right"></i></a>
                <hr class="my-1">
                <a class="nav-link d-flex justify-content-between align-items-center" href="">Contact Us <i class="bi bi-chevron-right"></i></a>
                <hr class="my-1">
                <a class="nav-link d-flex justify-content-between align-items-center" href="">Help <i class="bi bi-chevron-right"></i></a>
                <hr class="my-1">
            </div>
        </div>
    </div>
</header>