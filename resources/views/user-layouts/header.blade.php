<header id="header" class="header sticky-top position-relative">
  <!-- 🔹 Branding -->
  <div class="branding d-flex align-items-center justify-content-center position-relative">
    <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
      <img src="{{ asset('../assets-user/img/rumahbudayasumba.png') }}" alt="Logo" class="me-2" style="height:40px;">
      <h1 class="navbar-brand fw-bold fs-3 m-0">
        Rumah Budaya Sumba
      </h1>
    </a>

    <!-- 🔹 Language Switcher di pojok kanan atas -->
    <div class="position-absolute top-0 end-0 mt-2 me-3">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            🌐 {{ strtoupper(app()->getLocale()) }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="langDropdown">
            <li>
              <a href="{{ route('lang.switch', 'id') }}" class="dropdown-item d-flex align-items-center {{ app()->getLocale() == 'id' ? 'active' : '' }}">
                🇮🇩 <span class="ms-2">ID</span>
              </a>
            </li>
            <li>
              <a href="{{ route('lang.switch', 'en') }}" class="dropdown-item d-flex align-items-center {{ app()->getLocale() == 'en' ?   : '' }}">
                🇬🇧 <span class="ms-2">EN</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- 🔹 End Language Switcher -->

  </div>

  <!-- 🔹 Main Navbar -->
  <nav class="navbar navbar-expand-lg border-top" style="box-shadow: 0 4px 8px rgba(184, 159, 115, 0.5);">
    <div class="container">
      <!-- Mobile Toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
        <ul class="navbar-nav mb-2 mb-lg-0 fw-medium">
          <li class="nav-item px-2">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item px-2">
    <a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{ url('/about-us') }}">
        About <span style="color: #7B1E1E;">Sumba</span>
    </a>
</li>

          <li class="nav-item px-2">
            <a class="nav-link {{ request()->is('rooms') ? 'active' : '' }}" href="{{ url('/rooms') }}">Rooms</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link {{ request()->is('facilities-user') ? 'active' : '' }}" href="{{ url('/facilities-user') }}">Facilities</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link {{ request()->is('articles-user') ? 'active' : '' }}" href="{{ url('/articles-user') }}">Articles</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="{{ url('/contact-us') }}">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
