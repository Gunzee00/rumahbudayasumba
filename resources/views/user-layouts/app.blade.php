<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Rumah Budaya Sumba')</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('../assets-user/img/rumahbudayasumba.png') }}" rel="icon">
  <link href="{{ asset('../assets-user/img/rumahbudayasumba.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@300;400;600;700&family=Josefin+Sans:wght@300;400;600&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets-user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-user/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets-user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets-user/css/main.css') }}" rel="stylesheet">
</head>

<body class="@yield('body-class', 'index-page')">

  {{-- Header --}}
  @include('user-layouts.header')

  {{-- Main Content --}}
  <main class="main">
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('user-layouts.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets-user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets-user/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets-user/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets-user/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets-user/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets-user/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets-user/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets-user/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets-user/js/main.js') }}"></script>
</body>
</html>
