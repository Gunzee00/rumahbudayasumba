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

            <!-- Optional action buttons -->
            <div class="action-buttons">
              <a href="#" class="btn-explore">
                <i class="bi bi-compass"></i>
                Explore Our Heritage
              </a>
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn-video glightbox">
                <i class="bi bi-play-circle"></i>
                Watch Story
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section><!-- /About Section -->

</main>

@endsection
