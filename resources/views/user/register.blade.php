<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets-admin/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets-admin/img/favicon.png') }}">
  <title>Register - Argon Dashboard</title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets-admin/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets-admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets-admin/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" 
         style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets-admin/master/argon-dashboard-pro/assets-admin/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            <p class="text-lead text-white">Silakan daftar untuk membuat akun baru.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Register</h5>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Username --}}
                <div class="mb-3">
                  <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required>
                  @error('username')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                  @error('password')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-3">
                  <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Register</button>
                </div>

                <p class="text-sm mt-3 mb-0">
                  Sudah punya akun?
                  <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Login</a>
                </p>
              </form>

              {{-- Error umum --}}
              @if ($errors->any())
                <div class="alert alert-danger mt-3">
                  {{ $errors->first() }}
                </div>
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Core JS Files -->
  <script src="{{ asset('assets-admin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/argon-dashboard.min.js?v=2.1.0') }}"></script>
</body>

</html>
