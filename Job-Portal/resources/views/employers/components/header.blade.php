<!-- Header -->

@section('header-mobile')
<a href="{{ route('employer.account') }}"><i class="bi fs-2 px-1 text-secondary bi-person-fill"></i></a>
@endsection

@section('header-lg')
<div class="navbar-nav ">
    <a class="nav-link" href="{{ route('employer.dashboard') }}">Post Job</a>
</div>
<div class="d-flex align-items-center gap-2 ">
    @if(!Auth::guard('employer')->check())
    <a class="text-decoration-none text-primary" href="{{ route('employer.login')}}">Sign in</a>
    @else
    <div class="d-flex gap-2 align-items-center">
        <a class="text-decoration-none text-secondary" href="{{ route('employer.account')}}"><i class="bi fs-3 px-1 text-secondary bi-person-fill"></i></a>
    </div>
    @endif
    <span>|</span>
    <a class="text-decoration-none text-secondary" href="{{ route('home') }}">Find Job</a>
</div>
@endsection

@section('header-max-lg')
<div class="navbar-nav @yield('header-hide') ">
    <a class="nav-link active d-flex justify-content-between align-items-center" href="{{ route('employer.dashboard') }}">Home <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    <a class="nav-link d-flex justify-content-between align-items-center" href="{{ route('home') }}">Find Jobs <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    <a class="nav-link d-flex justify-content-between align-items-center" href="">Contact Us <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    <a class="nav-link d-flex justify-content-between align-items-center" href="">Help <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    @if(Auth::guard('employer')->check())
    <form class="d-flex justify-content-between m-0 align-items-center" action="{{ route('employer.logout') }}" method="post">
        @csrf
        <button type="submit" class="btn text-danger p-0 py-2">Logout</button>
        <i class="bi bi-chevron-right"></i>
    </form>
    <hr class="my-1">
    @else
    <a class="nav-link d-flex justify-content-between align-items-center" href="{{ route('employer.login')}}">Sign in <i class="bi bi-chevron-right"></i></a>
    <hr class="my-1">
    @endif

</div>
@endsection