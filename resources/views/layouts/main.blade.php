<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>@yield('title')</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    @if(env('APP_ENV') === 'local')
        @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/dashboard.js', 'resources/js/color-modes.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app-BWRwdEbe.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/app-CTHnBVe9.css') }}">
        <script src="{{ asset('build/assets/app-DP0g_4ws.js') }}"></script>
    @endif
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
   
</head>

<body>
    @include('layouts.partials.theme-button')

    @include('layouts.partials.header')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.partials.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 vh-100">
                @yield('form_open')
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2" style="color: #143967">@yield('section-title')</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        @yield('section-buttons')
                    </div>
                </div>
                @yield('content')
                @yield('form_close')
            </main>
        </div>
    </div>
       <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('scripts')
</body>

</html>
