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
                <img src="assets-user/img/hotel/showcase-9.webp" alt="Hotel Exterior" class="img-fluid main-image">
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

  
    <!-- Rooms Showcase Section -->
    <section id="rooms-showcase" class="rooms-showcase section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span class="description-title">Rooms</span>
        <h2>Rooms</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">
          <div class="col-xl-8" data-aos="zoom-in" data-aos-delay="200">
            <div class="hero-room-showcase">
              <div class="showcase-image-container">
                <img src="assets-user/img/hotel/room-14.webp" alt="Grand Presidential Suite" class="img-fluid">
                <div class="room-category-badge">
                  <span>Presidential</span>
                </div>
                <div class="room-details-overlay">
                  <div class="room-specs">
                    <span class="spec-item">
                      <i class="bi bi-people"></i>
                      <span>6 Guests</span>
                    </span>
                    <span class="spec-item">
                      <i class="bi bi-house"></i>
                      <span>180m²</span>
                    </span>
                    <span class="spec-item">
                      <i class="bi bi-geo-alt"></i>
                      <span>Top Floor</span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="showcase-content">
                <div class="room-title-section">
                  <h2>Grand Presidential Suite</h2>
                  <div class="room-rating">
                    <div class="stars">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                    </div>
                    <span class="rating-text">5.0 Excellence</span>
                  </div>
                </div>
                <p class="room-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
           
               
              </div>
            </div>
          </div><!-- End Hero Room -->
        </div>
      </div>

    </section><!-- /Rooms Showcase Section -->

</main>

@endsection
