<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'R17 - Muhammad Irfan Fakhri') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">


</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">R17 - Muhammad Irfan Fakhri</a>
    </div>
</nav>

<!-- Page Content -->
<main class="mt-4">
    <div class="container pb-5">

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</main>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
@stack('scripts')
</body>
</html>
