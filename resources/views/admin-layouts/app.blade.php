<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets-admin/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets-admin/img/favicon.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets-admin/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets-admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- Argon CSS -->
  <link id="pagestyle" href="{{ asset('assets-admin/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />

  <title>@yield('title', 'Admin Panel')</title>
</head>
<body class="g-sidenav-show bg-gray-100">
  
  <div class="min-height-300 bg-dark position-absolute w-100"></div>

  {{-- Sidebar --}}
  @include('admin-layouts.sidebar')

  <main class="main-content position-relative border-radius-lg">
    {{-- Navbar/Header --}}
    @includeWhen(View::exists('admin-layouts.header'), 'admin-layouts.header')

    {{-- Konten Halaman --}}
    <div class="container-fluid py-4">
      @yield('content')
    </div>
  </main>

  {{-- Footer --}}
  @includeWhen(View::exists('admin-layouts.footer'), 'admin-layouts.footer')

  {{-- Script --}}
  <script src="{{ asset('assets-admin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/plugins/chartjs.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/argon-dashboard.min.js?v=2.1.0') }}"></script>

  @stack('scripts')
</body>
</html>
