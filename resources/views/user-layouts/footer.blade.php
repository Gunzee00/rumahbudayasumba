<footer id="footer" class="footer position-relative" style="background-color: white; color: black;">
  <div class="footer-top" style="background-color: white; color: black;">
    <div class="container">
      <div class="row gy-4">

        <!-- Kolom Info -->
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('../assets-user/img/rumahbudayasumba.png') }}" 
              alt="Rumah Budaya Sumba Logo" 
              style="height:100px; width:auto; margin-right:10px;">
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
            <div>
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
        </div>

        <!-- Kolom Map -->
     <div class="col-lg-8 col-md-6 d-flex justify-content-end">
  <div style="border-radius: 10px; overflow: hidden; max-width: 400px; height: 200px;">
    <iframe 
      src="https://www.google.com/maps?q=Jl.+Rumah+Budaya+no+212,+Kalembu+Nga’banga,+Weetebula,+Southwest+Sumba,+East+Nusa+Tenggara,+Indonesia&output=embed" 
      width="100%" 
      height="100%" 
      style="border:0;" 
      allowfullscreen 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</div>



      </div>
    </div>
  </div>
</footer>
