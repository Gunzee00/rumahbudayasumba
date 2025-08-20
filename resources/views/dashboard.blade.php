@extends('user-layouts.app')

@section('title', 'Home - Grandoria')

@section('content')

  <main class="main">

    <!-- Hotel Hero Section -->
    <section id="hotel-hero" class="hotel-hero section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="hero-content">
              <h1>Luxury Redefined in Every Stay</h1>
              <p class="lead">Experience unparalleled comfort and sophistication at our premium hotel. From elegant suites to world-class amenities, every moment of your stay is crafted to perfection.</p>                           
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="hero-images">
              <div class="main-image">
                <img src="assets-user/img/hotel/showcase-3.webp" alt="Luxury Hotel" class="img-fluid">
              </div>             
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Hotel Hero Section -->

    <!-- About Home Section -->
    <section id="about-home" class="about-home section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center">

          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="about-content">
              <h2>Welcome to Grandoria Resort</h2>
              <p class="lead">Where luxury meets tranquility in the heart of nature's paradise.</p>
              <p>Nestled among rolling hills and pristine landscapes, Grandview Resort has been offering exceptional hospitality for over three decades. Our commitment to excellence and attention to detail creates an unforgettable experience for discerning travelers seeking both comfort and adventure.</p>
              <p>From our elegantly appointed suites to our world-class amenities, every aspect of your stay is designed to exceed expectations. Discover breathtaking views, exquisite dining, and personalized service that makes every moment special.</p>

              <div class="stats-row">
                <div class="stat-item">
                  <div class="stat-number">185</div>
                  <div class="stat-label">Luxury Rooms</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">98%</div>
                  <div class="stat-label">Guest Satisfaction</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">30</div>
                  <div class="stat-label">Years of Excellence</div>
                </div>
              </div><!-- End Stats Row -->

              <div class="about-actions">
                <a href="about.html" class="btn-primary">Our Story</a>
                <a href="rooms.html" class="btn-secondary">View Rooms</a>
              </div>
            </div>
          </div><!-- End About Content -->

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="about-images">
              <div class="main-image">
                <img src="assets-user/img/hotel/showcase-8.webp" alt="Grandview Resort Main View" class="img-fluid">
              </div>
              <div class="secondary-image">
                <img src="assets-user/img/hotel/room-12.webp" alt="Luxury Suite Interior" class="img-fluid">
              </div>
              <div class="experience-badge">
                <div class="badge-content">
                  <span class="badge-number">30+</span>
                  <span class="badge-text">Years<br>Experience</span>
                </div>
              </div>
            </div>
          </div><!-- End About Images -->

        </div>

      </div>

    </section><!-- /About Home Section -->
    <section id="events-cards" class="events-cards section">

      <div class="container section-title" data-aos="fade-up">
        <span class="description-title">Events</span>
        <h2>Events</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
          <div class="col-lg-4 col-md-6">
            <div class="event-item" data-aos="fade-up" data-aos-delay="100">
              <div class="event-header">
                <div class="event-icon">
                  <i class="bi bi-heart-fill"></i>
                </div>
                <img src="assets-user/img/hotel/event-1.webp" alt="Wedding Celebrations" class="img-fluid">
              </div>
              <div class="event-content">
                <h4>Wedding Celebrations</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor</p>
                <div class="event-features">
                  <span class="feature-item"><i class="bi bi-check-circle"></i> Premium Venues</span>
                  <span class="feature-item"><i class="bi bi-check-circle"></i> Full Catering</span>
                </div>
                <a href="hotel-events.html" class="event-link">
                  Explore Details <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="event-item" data-aos="fade-up" data-aos-delay="200">
              <div class="event-header">
                <div class="event-icon">
                  <i class="bi bi-building"></i>
                </div>
                <img src="assets-user/img/hotel/event-4.webp" alt="Business Conferences" class="img-fluid">
              </div>
              <div class="event-content">
                <h4>Business Conferences</h4>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                <div class="event-features">
                  <span class="feature-item"><i class="bi bi-check-circle"></i> Modern Tech</span>
                  <span class="feature-item"><i class="bi bi-check-circle"></i> WiFi Access</span>
                </div>
                <a href="hotel-events.html" class="event-link">
                  Explore Details <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="event-item" data-aos="fade-up" data-aos-delay="300">
              <div class="event-header">
                <div class="event-icon">
                  <i class="bi bi-calendar-event"></i>
                </div>
                <img src="assets-user/img/hotel/event-8.webp" alt="Special Occasions" class="img-fluid">
              </div>
              <div class="event-content">
                <h4>Special Occasions</h4>
                <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi</p>
                <div class="event-features">
                  <span class="feature-item"><i class="bi bi-check-circle"></i> Custom Setup</span>
                  <span class="feature-item"><i class="bi bi-check-circle"></i> Event Coordination</span>
                </div>
                <a href="hotel-events.html" class="event-link">
                  Explore Details <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="gallery-showcase" class="gallery-showcase section">
<div class="container section-title" data-aos="fade-up">
        <span class="description-title">Galeri</span>
        <h2>Galeri </h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="gallery-carousel swiper init-swiper" data-aos="fade-up" data-aos-delay="200">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 3000
              },
              "slidesPerView": 1,
              "spaceBetween": 20,
              "centeredSlides": true,
              "breakpoints": {
                "576": {
                  "slidesPerView": 2,
                  "centeredSlides": false
                },
                "768": {
                  "slidesPerView": 3,
                  "centeredSlides": false
                },
                "992": {
                  "slidesPerView": 4,
                  "centeredSlides": false
                },
                "1200": {
                  "slidesPerView": 5,
                  "centeredSlides": false
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="assets-user/img/hotel/gallery-1.webp" alt="Luxurious Suite" class="img-fluid" loading="lazy">
                <a href="assets-user/img/hotel/gallery-1.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="assets-user/img/hotel/gallery-5.webp" alt="Modern Lobby" class="img-fluid" loading="lazy">
                <a href="assets-user/img/hotel/gallery-5.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="assets-user/img/hotel/gallery-12.webp" alt="Elegant Dining Area" class="img-fluid" loading="lazy">
                <a href="assets-user/img/hotel/gallery-12.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="assets-user/img/hotel/gallery-8.webp" alt="Grand Ballroom Setup" class="img-fluid" loading="lazy">
                <a href="assets-user/img/hotel/gallery-8.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="assets-user/img/hotel/gallery-15.webp" alt="Relaxing Poolside" class="img-fluid" loading="lazy">
                <a href="assets-user/img/hotel/gallery-15.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="assets-user/img/hotel/gallery-3.webp" alt="Cozy Guest Room" class="img-fluid" loading="lazy">
                <a href="assets-user/img/hotel/gallery-3.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="assets-user/img/hotel/gallery-18.webp" alt="Spa and Wellness Center" class="img-fluid" loading="lazy">
                <a href="assets-user/img/hotel/gallery-18.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="assets-user/img/hotel/gallery-7.webp" alt="Conference Facilities" class="img-fluid" loading="lazy">
                <a href="assets-user/img/hotel/gallery-7.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="300">
          <a href="gallery.html" class="btn btn-gallery">
            <i class="bi bi-collection me-2"></i>Discover Our Full Gallery
          </a>
        </div>
      </div>
    </section>
  </main>
@endsection
