@extends('user-layouts.app')

@section('title', 'Home - Grandoria')

@section('content')
<main class="main">

  <!-- Room Details Section -->
  <section id="room-details" class="room-details section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <!-- 🔹 Room Gallery -->
      <div class="room-gallery mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="gallery-grid">
          <div class="gallery-main">
            @php
              $allImages = [];
              for ($i=1; $i<=10; $i++) {
                if (!empty($room->{'image'.$i})) {
                  $allImages[] = $room->{'image'.$i};
                }
              }
            @endphp

            @if(count($allImages) > 0)
              {{-- Gambar utama sebagai trigger modal --}}
              <a href="#" data-bs-toggle="modal" data-bs-target="#roomGalleryModal">
                <img src="{{ $allImages[0] }}" alt="{{ $room->name_room }}" 
                    class="img-fluid rounded" style="max-height:400px; object-fit:cover; width:100%;">
              </a>
            @else
              <a href="#" data-bs-toggle="modal" data-bs-target="#roomGalleryModal">
                <img src="assets-user/img/hotel/room-15.webp" alt="{{ $room->name_room }}" 
                    class="img-fluid rounded" style="max-height:400px; object-fit:cover; width:100%;">
              </a>
            @endif
          </div>

          {{-- Thumbnail beberapa --}}
          <div class="gallery-thumbnails">
            @foreach(array_slice($allImages, 1, 4) as $thumb)
              <a href="#" data-bs-toggle="modal" data-bs-target="#roomGalleryModal">
                <img src="{{ $thumb }}" alt="Thumbnail" 
                    class="img-fluid rounded" style="max-height:120px; object-fit:cover;">
              </a>
            @endforeach
          </div>
        </div>
      </div>

 <!-- 🔹 Modal Pop Up Gallery -->
<div class="modal fade" id="roomGalleryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-header border-0">
        <h5 class="modal-title text-white">{{ $room->name_room }} - Gallery</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="custom-grid-5">
          @foreach($allImages as $img)
            <div class="img-wrapper">
              <img src="{{ $img }}" alt="Room Image" class="rounded shadow-sm gallery-preview">
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 🔹 Modal Preview Gambar -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark">
      <div class="modal-header border-0">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="" id="previewImage" class="img-fluid rounded" alt="Preview">
      </div>
    </div>
  </div>
</div>

{{-- 🔹 CSS custom grid --}}
<style>
  .custom-grid-5 {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 15px;
  }

  .custom-grid-5 .img-wrapper {
    width: 100%;
    height: 200px;
    overflow: hidden;
    border-radius: 8px;
    cursor: pointer;
  }

  .custom-grid-5 img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s;
  }

  .custom-grid-5 img:hover {
    transform: scale(1.05);
  }

  @media (max-width: 992px) {
    .custom-grid-5 {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  @media (max-width: 576px) {
    .custom-grid-5 {
      grid-template-columns: repeat(2, 1fr);
    }
  }
</style>

{{-- 🔹 JS Preview Gambar --}}
<script>
  document.querySelectorAll('.gallery-preview').forEach(img => {
    img.addEventListener('click', function() {
      const preview = document.getElementById('previewImage');
      preview.src = this.src; // set src modal preview
      const modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
      modal.show();
    });
  });
</script>




      <!-- 🔹 Room Info -->
      <div class="row align-items-center mb-5">
        <div class="col-lg-6">
          <h1 class="room-title">{{ $room->name_room }}</h1>
          <div class="room-info mb-3 d-flex gap-4">
            <p class="mb-0 d-flex align-items-center">
              <i class="bi bi-house-door me-2"></i> 
              {{ $room->jumlah_kamar }} Kamar
            </p>
            <p class="mb-0 d-flex align-items-center">
              <i class="bi bi-people me-2"></i> 
              {{ $room->jumlah_tamu }} Tamu
            </p>
          </div>
        </div>
        <div class="col-lg-6 text-lg-end text-start mt-3 mt-lg-0">
          <div class="room-price mb-3">
            <span class="price-amount">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
            <span class="price-period">/ malam</span>
          </div>
          <a href="{{ route('booking.create', $room->id) }}" class="btn btn-book-now">Book Now</a>
        </div>
      </div>

      <!-- 🔹 Room Description + Facilities -->
      <div class="row mb-5">
        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
          <div class="room-description">
            <h3 class="section-subtitle">Room Overview</h3>
            <p>{{ $room->desc }}</p>

            {{-- Fasilitas --}}
            @php
              $allFacilities = [];
              for ($i=1; $i<=10; $i++) {
                if (!empty($room->{'fasilitas'.$i})) {
                  $allFacilities[] = $room->{'fasilitas'.$i};
                }
              }
              $half = ceil(count($allFacilities) / 2);
              $left = array_slice($allFacilities, 0, 5);
              $right = array_slice($allFacilities, 5, 5);
            @endphp

            @if(count($allFacilities) > 0)
              <h5 class="mb-2">Facilities:</h5>
              <div class="row">
                <div class="col-md-6">
                  <ul>
                    @foreach($left as $f)
                      <li>{{ $f }}</li>
                    @endforeach
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul>
                    @foreach($right as $f)
                      <li>{{ $f }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            @endif
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="highlight-box">
            <div class="highlight-icon">
              <i class="bi bi-star"></i>
            </div>
            <h4>Rumah Budaya Sumba</h4>
            <p>"The most beautiful suite we've ever stayed in. The ocean view is absolutely breathtaking and the attention to detail is remarkable."</p>
            <div class="quote-author">
              <span>- Sarah M., Verified Guest</span>
            </div>
          </div>
        </div>
      </div>     

    </div>
  </section>
</main>
@endsection
