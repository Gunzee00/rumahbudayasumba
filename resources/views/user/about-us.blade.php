@extends('user-layouts.app')

@section('title', 'About Us - Grandoria')

@section('content')

<main class="main">

  <!-- About Section -->
  <section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row align-items-center">

        <!-- Image -->
        <div class="col-lg-5">
          <div class="image-stack">
            <div class="main-image-wrapper" data-aos="fade-right" data-aos-delay="200">
              @if($about && $about->image)
                <img src="{{ $about->image }}" alt="{{ $about->title }}" class="img-fluid main-image">
              @else
                <img src="assets-user-user/img/hotel/showcase-9.webp" alt="Hotel Exterior" class="img-fluid main-image">
              @endif
            </div>
          </div>
        </div>

        <!-- Content -->
        <div class="col-lg-7">
          <div class="content-wrapper" data-aos="fade-left" data-aos-delay="200">
            <div class="badge">
              <span>Est. 1923</span>
            </div>

            <h2>{{ $about->title ?? 'Title' }}</h2>

            <p class="lead">
              {{ $about->subtitle ?? 'Subtitle' }}
            </p>

            <p>
              {{ $about->description ?? 'Description' }}
            </p>  
        
      </div>
    </div>
  </section><!-- /About Section -->

<section id="offer-cards" class="offer-cards section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span class="description-title">Offers</span>
    <h2>Offers</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4">
      @forelse($rooms as $room)
        <div class="col-lg-4 col-md-6">
          <div class="offer-card" data-aos="zoom-in" data-aos-delay="200">
              <a href="{{ route('room.detail', $room->id) }}" class="room-card d-block text-decoration-none text-dark h-100">

            <!-- Room Image -->
            <div class="offer-image">
              @if($room->image)
                <img src="{{ $room->image }}" alt="{{ $room->name_room }}" class="img-fluid">
              @else
                <img src="assets-user/img/hotel/showcase-3.webp" alt="{{ $room->name_room }}" class="img-fluid">
              @endif
            </div>

            <!-- Room Content -->
            <div class="offer-content">
              <h3>{{ $room->name_room }}</h3>
              <p>{{ \Illuminate\Support\Str::limit($room->desc, 100, '...') }}</p>
              <div class="offer-details">
                <div class="price-info">
                  <span class="offer-price">${{ number_format($room->price, 0, ',', '.') }}</span>
                  <span class="per-night">per night</span>
                </div>
              </div>
              <a href="{{ route('room.detail', $room->id) }}" class="btn-book">Book Now</a>
            </div>

          </div>
           </a>
        </div>
      @empty
        <div class="col-12 text-center">
          <p>Belum ada room tersedia.</p>
        </div>
      @endforelse
    </div>

</div>

</section><!-- /Offer Cards Section -->



</main>

@endsection
