<header id="header" class="header sticky-top bg-white shadow-sm">

  <!-- 🔹 Top Bar (User Menu) -->
  <div class="topbar py-1 border-bottom">
    <div class="container d-flex justify-content-end align-items-center small">
      <ul class="d-flex list-unstyled mb-0">
        <li class="me-3">
          <a href="{{ url('/my-bookings') }}" class="nav-link-top">
            <i class="bi bi-journal-bookmark me-1"></i> Booking
          </a>
        </li>
        @if(Auth::check())
          <li class="me-3">
            <a href="{{ url('/profile') }}" class="nav-link-top">
              <i class="bi bi-person-circle me-1"></i> Profile
            </a>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-link p-0 m-0 nav-link-top">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
              </button>
            </form>
          </li>
        @else
          <li>
            <a href="{{ url('/login') }}" class="nav-link-top">
              <i class="bi bi-key me-1"></i> Login
            </a>
          </li>
        @endif
      </ul>
    </div>
  </div>

  <!-- 🔹 Branding -->
 <div class="branding py-3 text-center">
    <a href="{{ url('/') }}"><h1  class="navbar-brand fw-bold fs-3 m-0" >
      Rumah Budaya Sumba
    </h1></a>
  </div>


  <!-- 🔹 Main Navbar -->
  <nav class="navbar navbar-expand-lg border-top" style="background-color: var(--background-color);">
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
            <a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{ url('/about-us') }}">About Us</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link {{ request()->is('rooms') ? 'active' : '' }}" href="{{ url('/rooms') }}">Rooms</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link {{ request()->is('facilities-user') ? 'active' : '' }}" href="{{ url('/facilities-user') }}">Facilities</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="{{ url('/contact-us') }}">Contact Us</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

</header>
