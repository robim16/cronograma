<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminLte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <link href="{{ asset('adminLte/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
  <link href="{{ asset('adminLte/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('adminLte/plugins/fullcalendar/main.css') }}" rel="stylesheet"> --}}

  <link href="{{ asset('favicon_io/favicon.ico') }}" rel="icon" type="image/x-icon" />

  @stack('styles')
</head>
