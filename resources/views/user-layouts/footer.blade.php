<footer id="footer" class="footer position-relative dark-background">
  <div class="footer-top">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <span class="sitename">Rumah Budaya Sumba</span>
          </a>
          <div class="footer-contact pt-3">
            <p>{{ $footer->address ?? 'Alamat belum diatur' }}</p>
            <p class="mt-3">
              <strong>Phone:</strong> <span>{{ $footer->phone ?? '-' }}</span>
            </p>
            <p>
              <strong>Email:</strong> <span>{{ $footer->email ?? '-' }}</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="copyright text-center">
    <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
      <div class="d-flex flex-column align-items-center align-items-lg-start">
        <div>
          © Copyright <strong><span>MyWebsite</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
        @if(!empty($footer->youtube))
          <a href="{{ $footer->youtube }}" target="_blank"><i class="bi bi-youtube"></i></a>
        @endif
        @if(!empty($footer->facebook))
          <a href="{{ $footer->facebook }}" target="_blank"><i class="bi bi-facebook"></i></a>
        @endif
        @if(!empty($footer->instagram))
          <a href="{{ $footer->instagram }}" target="_blank"><i class="bi bi-instagram"></i></a>
        @endif
        @if(!empty($footer->phone))
          <a href="tel:{{ $footer->phone }}"><i class="bi bi-telephone"></i></a>
        @endif
      </div>
    </div>
  </div>
</footer>
