<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Favicons -->
    <link href="{{ asset('admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">    
    <link href="{{ asset('admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">    
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>
<body>
    
    @include('layouts.incadmin.header')
    @include('layouts.incadmin.sidebar')
    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    @include('layouts.incadmin.footer')
    
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    <!-- Scripts -->
    <script src="{{ asset('admin/vendor/apexcharts/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/chart.js/chart.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/echarts/echarts.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/quill/quill.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/simple-datatables/simple-datatables.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/tinymce/tinymce.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/php-email-form/validate.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
    <!-- Template Main JS File -->
    <script src="{{ asset('admin/js/main.js') }}" defer></script>
</body>
</html>
