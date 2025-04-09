<!-- Header Employee-->

@section('header-mobile')
<a href="{{ route('user-account') }}"><i class="bi fs-2 px-1 text-secondary bi-person-fill"></i></a>
@endsection

@section('header-lg')
<div class="navbar-nav ">
    <a class="nav-link" href="{{ route('home') }}">Home</a>
    <a class="nav-link" href="{{ route('jobs') }}">Jobs</a>
</div>
<div class="d-flex align-items-center gap-2 ">
    @if(Auth::guard('web')->check())
    <a class="text-decoration-none text-secondary" href="{{ route('user-account')}}"><i class="bi fs-3 px-1 text-secondary bi-person-fill"></i></a>
    @else
    <a class="text-decoration-none text-primary" href="{{ route('login')}}">Sign In</a>
    @endif
    <span>|</span>
    <a class="text-decoration-none text-secondary" href="{{ route('employer.dashboard') }}">Employers/Post Job</a>
</div>
@endsection

@section('header-max-lg')
<div class="navbar-nav ">
    <a class="nav-link active d-flex justify-content-between align-items-center" href="{{ route('home') }}">Home <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    <a class="nav-link d-flex justify-content-between align-items-center" href="{{ route('jobs') }}">Jobs <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    <a class="nav-link d-flex justify-content-between align-items-center" href="{{ route('employer.dashboard') }}">Employer/Post job <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    <a class="nav-link d-flex justify-content-between align-items-center" href="">Contact Us <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    <a class="nav-link d-flex justify-content-between align-items-center" href="">Help <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    @if(Auth::guard('web')->check())
    <form class="d-flex justify-content-between align-items-center" action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn text-danger p-0 py-2">Logout</button>
        <i class="bi bi-chevron-right"></i>
    </form>
    <hr class="my-1">
    @else
    <a class="nav-link d-flex justify-content-between align-items-center" href="{{ route('login')}}">Sign in <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    @endif
</div>
@endsection