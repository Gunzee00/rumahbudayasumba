<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets-admin/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets-admin/img/favicon.png') }}">
  <title>Login - Argon Dashboard</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets-admin/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets-admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets-admin/css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />

  <!-- 🎨 Warna Custom -->
  <style>
    :root { 
      --background-color: #FFFFFF;     /* Putih → background utama */
      --default-color: #000000;        /* Hitam → teks utama */
      --heading-color: #7B1E1E;        /* Merah marun → heading, title */
      --accent-color: #7B1E1E;         /* Merah marun → tombol, link, highlight */
      --surface-color: #D9C6A5;        /* Beige → card, box, surface section */
      --contrast-color: #FFFFFF;       /* Putih → teks kontras di atas warna gelap */
    }

    body {
      background-color: var(--background-color);
      color: var(--default-color);
      font-family: 'Open Sans', sans-serif;
    }

    h1, h2, h3, h4, h5, h6 {
      color: var(--heading-color);
    }

    .btn-primary {
    background-color: var(--accent-color);
    border-color: var(--accent-color);
    color: var(--contrast-color);
    transition: all 0.2s ease-in-out;
  }
  .btn-primary:hover {
    background-color: var(--heading-color); /* warna heading biar beda sedikit */
    border-color: var(--heading-color);
    color: var(--contrast-color);
  }

  .btn-primary:active,
  .btn-primary:focus {
    background-color: var(--default-color); /* jadi hitam saat ditekan */
    border-color: var(--default-color);
    color: var(--contrast-color);
    box-shadow: 0 0 0 0.25rem rgba(123, 30, 30, 0.3); /* efek fokus sesuai marun */
  }

    .btn-outline-secondary {
      border-color: var(--accent-color);
      color: var(--accent-color);
    }

    .btn-outline-secondary:hover {
      background-color: var(--accent-color);
      color: var(--contrast-color);
    }

    .card {
      background-color: var(--surface-color);
      border-radius: 12px;
    }

    .text-danger {
      color: var(--heading-color) !important;
    }
  </style>
</head>


<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Login</h4>
                  <p class="mb-0">Masukkan username dan password untuk login</p>
                </div>
                <div class="card-body">

                  {{-- Form Login --}}
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Username --}}
                    <div class="mb-3">
                      <input type="text" name="username" class="form-control form-control-lg"
                        placeholder="Username" value="{{ old('username') }}" required autofocus>
                      @error('username')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control form-control-lg"
                        placeholder="Password" required>
                      @error('password')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary w-100 mt-4 mb-0">Login</button>
                    </div>
                  </form>

                  {{-- Tombol ke register --}}
{{-- <div class="text-center mt-3">
  <p class="mb-0">Belum punya akun?</p>
  <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg w-100 mt-2">Daftar Sekarang</a>
</div> --}}


                  {{-- Error umum --}}
                  @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                      {{ $errors->first() }}
                    </div>
                  @endif

                </div>
   
              </div>
            </div>
           <div
  class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
  <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
    style="background-color: var(--surface-color);">
    
    <!-- ✅ Tambahkan Logo di atas Judul -->
    <img src="{{ asset('assets-admin/img/logo.png') }}" 
         alt="Logo Rumah Budaya Sumba" 
         class="mx-auto mb-3" 
         style="max-width: 320px; height: auto;">

    <h1 class="mt-2 font-weight-bolder position-relative" style="color: var(--accent-color);">
        Rumah Budaya Sumba
    </h1>
    <p class="position-relative" style="color: var(--accent-color);">
      The more effortless the writing looks, the more effort the writer actually put into the process.
    </p>
  </div>
</div>


          </div>
        </div>
      </div>
    </section>
  </main>

  <!--   Core JS Files   -->
  <script src="{{ asset('assets-admin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/argon-dashboard.min.js?v=2.1.0') }}"></script>
</body>
</html>
