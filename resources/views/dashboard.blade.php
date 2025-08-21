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
                    <h1>{{ $home->title ?? 'Default Title' }}</h1>
                    <p class="lead">{{ $home->desc ?? 'Default description...' }}</p>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                <div class="hero-images">
                    <div class="main-image">
                        @if(!empty($home->main_image))
                            <img src="{{ $home->main_image }}" alt="{{ $home->title }}" class="img-fluid">
                        @else
                            <img src="assets-user/img/hotel/showcase-3.webp" alt="Default Image" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


    <!-- Sub Home -->
   <section id="about-home" class="about-home section light-background">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 align-items-center">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="about-content">
          <h2>{{ $subhome->title ?? 'Default Title' }}</h2>
          <p class="lead">{{ $subhome->sub_title ?? 'Default Subtitle' }}</p>
          <p>{{ $subhome->description ?? 'Default Description' }}</p>
          <div class="about-actions">
            <a href="about.html" class="btn-primary">Our Story</a>
            <a href="rooms.html" class="btn-secondary">View Rooms</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="about-images">
          <div class="main-image">
            <img src="{{ $subhome->image1 ?? asset('assets-user/img/hotel/showcase-8.webp') }}" 
                 alt="Main Image" class="img-fluid">
          </div>
          <div class="secondary-image">
            <img src="{{ $subhome->image2 ?? asset('assets-user/img/hotel/room-12.webp') }}" 
                 alt="Secondary Image" class="img-fluid">
          </div>   
        </div>
      </div>
    </div>
  </div>
</section>
<section id="events-cards" class="events-cards section">
  <div class="container section-title" data-aos="fade-up">
    <span class="description-title">Latest News</span>
    <h2>Latest News</h2>
    <p>The latest news in ruma sumba</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4">
      @forelse($news as $item)
        <div class="col-lg-4 col-md-6">
          <div class="event-item" data-aos="fade-up" data-aos-delay="100">
            <div class="event-header">
              <div class="event-icon">
                <i class="bi bi-heart-fill"></i>
              </div>
              <img src="{{ $item->image }}" alt="{{ $item->title }}" class="img-fluid">
            </div>
            <div class="event-content">
              <h4>{{ $item->title }}</h4>
              <p>{{ Str::limit($item->desc, 100) }}</p>
              <a href="#" class="event-link">
                Explore Details <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center text-muted">
          Belum ada berita terbaru
        </div>
      @endforelse
    </div>
  </div>
</section>
<section id="gallery-showcase" class="gallery-showcase section">
  <div class="container section-title" data-aos="fade-up">
    <span class="description-title">Galeri</span>
    <h2>Galeri</h2>
    <p>Picture of Rumah Sumba</p>
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
        @forelse($galeri as $item)
          <div class="swiper-slide">
            <div class="gallery-item">
              <img src="{{ $item->image }}" alt="{{ $item->caption ?? 'Galeri' }}" class="img-fluid" loading="lazy">
              <a href="{{ $item->image }}" class="gallery-overlay glightbox">
                <i class="bi bi-eye"></i>
              </a>
            </div>
          </div>
        @empty
          <div class="text-center text-muted">
            Belum ada gambar galeri
          </div>
        @endforelse
      </div>
    </div>
  </div>
</section>

      </main>
@endsection
