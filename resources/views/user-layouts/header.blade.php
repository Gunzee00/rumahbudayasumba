<header id="header" class="header sticky-top" style="background-color: white;">
  <!-- Navbar Tingkat Pertama -->
  <div class="top-navbar" style="background-color: #ffffff;">
    <div class="container d-flex justify-content-end py-1">
      <ul class="d-flex list-unstyled mb-0">
        <li class="me-3"><a href="{{ url('/my-bookings') }}" style="color: black; text-decoration:none;">Booking</a></li>
        @if(Auth::check())
          <li class="me-3"><a href="{{ url('/profile') }}" style="color: black; text-decoration:none;">Profile</a></li>
          <li>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" style="border:none;background:none;padding:0;margin:0;color:black;cursor:pointer;">Logout</button>
            </form>
          </li>
        @else
          <li><a href="{{ url('/login') }}" style="color: black; text-decoration:none;">Login</a></li>
        @endif
      </ul>
    </div>
  </div>

  <!-- Navbar Tingkat Kedua (sudah ada) -->
  <div class="branding d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <h1 class="sitename" style="color: black;">Rumah Budaya Sumba</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}" class="active" style="color: black;">Home</a></li>
          <li><a href="{{ url('/about-us') }}" style="color: black;">About Us</a></li>
          <li><a href="{{ url('/rooms') }}" style="color: black;">Rooms</a></li>
          <li><a href="{{ url('/rooms') }}" style="color: black;">Facility</a></li>
          <li><a href="{{ url('/contact-us') }}" style="color: black;">Contact Us</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list" style="color: black;"></i>
      </nav>
    </div>
  </div>
</header>
