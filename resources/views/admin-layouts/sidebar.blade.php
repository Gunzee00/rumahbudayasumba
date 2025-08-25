<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html" target="_blank">
      <img src="{{ asset('assets-admin/img/logo-ct-dark.png') }}" width="26" height="26" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Rumah Budaya Sumba</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.dashboard') }}">
          <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-tachometer-alt text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('home.index') }}">
          <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-home text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Home Management</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('subhome.index') }}">
          <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-th-large text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Sub Home Management</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('galeri.index') }}">
          <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-images text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Galeri Management</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('news.index') }}">
          <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-newspaper text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">News Management</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('footer.index') }}">
          <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-shoe-prints text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Footer Management</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('about.index') }}">
          <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-info-circle text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">About Us Management</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('contact.index') }}">
          <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-envelope text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Message</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('rooms.index') }}">
          <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-bed text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Room Management</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.management-booking') }}">
          <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-calendar-check text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Booking Room</span>
        </a>
      </li>

      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="nav-link border-0 bg-transparent p-0">
            <div class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-sign-out-alt text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </button>
        </form>
      </li>

    </ul>
  </div>
</aside>
