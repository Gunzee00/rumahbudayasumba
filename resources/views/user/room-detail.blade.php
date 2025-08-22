@extends('user-layouts.app')

@section('title', 'Home - Grandoria')

@section('content')
<main class="main">

  <!-- Room Details Section -->
  <section id="room-details" class="room-details section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <!-- Room Header with Image and Basic Info -->
      <div class="row align-items-center mb-5">
        <div class="col-lg-7" data-aos="fade-right" data-aos-delay="200">
          <div class="room-header-image">
            @if($room->image)
              <img src="{{ $room->image }}" alt="{{ $room->name_room }}" class="img-fluid rounded">
            @else
              <img src="assets-user/img/hotel/room-15.webp" alt="{{ $room->name_room }}" class="img-fluid rounded">
            @endif
          </div>
        </div>
        <div class="col-lg-5" data-aos="fade-left" data-aos-delay="300">
          <div class="room-header-content">
            <h1 class="room-title">{{ $room->name_room }}</h1>
            <div class="room-capacity mb-4">
              {{-- Tambahkan info kapasitas jika ada --}}
            </div>
            <div class="room-price">
              <span class="price-amount">${{ number_format($room->price, 0, ',', '.') }}</span>
              <span class="price-period">per night</span>
            </div>
            <a href=" " class="btn btn-book-now">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Room Description -->
      <div class="row mb-5">
        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
          <div class="room-description">
            <h3 class="section-subtitle">Room Overview</h3>
            <p>{{ $room->desc }}</p>
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

  </section><!-- /Room Details Section -->

</main>

@endsection
