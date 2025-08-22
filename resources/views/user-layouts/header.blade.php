<header id="header" class="header sticky-top">
  <div class="branding d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <h1 class="sitename">Rumah Budaya Sumba</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}" class="active">Home</a></li>
          <li><a href="{{ url('/about-us') }}">About Us</a></li>
          <li><a href="{{ url('/rooms') }}">Rooms</a></li>
          <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
          <li><a href="{{ url('/my-bookings') }}">Booking</a></li>

          @if(Auth::check())
            <li><a href="{{ url('/profile') }}">Profile</a></li>
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="border:none;background:none;padding:0;margin:0;color:#fff;cursor:pointer;">
                  Logout
                </button>
              </form>
            </li>
          @else
            <li><a href="{{ url('/login') }}">Login</a></li>
          @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </div>
</header>
