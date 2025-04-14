<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js',])
</head>

<body>

    <header>
        @include('layouts.header') <!-- Include Header -->
    </header>

    <main class="@yield('page-class')">
        @yield('content') <!-- Content Section -->
    </main>

    <footer class="@yield('hide-footer')">
        @include('layouts.footer') <!-- Include Footer -->
    </footer>

    @stack('scripts')

</body>

</html>