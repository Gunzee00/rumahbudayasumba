@extends('user-layouts.app')

@section('title', 'About Us - Grandoria')

@section('content')

<main class="main">

  <!-- About Section (pertama) -->
  <section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row align-items-center">
        @if($firstAbout && $firstAbout->image)
          <div class="col-lg-5">
            <div class="image-stack">
              <div class="main-image-wrapper" data-aos="fade-right" data-aos-delay="200">
                <img src="{{ $firstAbout->image }}" alt="{{ $firstAbout->title }}" class="img-fluid main-image">
              </div>
            </div>
          </div>
          <div class="col-lg-7">
        @else
          <div class="col-lg-12">
        @endif

          <div class="content-wrapper" data-aos="fade-left" data-aos-delay="200">
            <div class="badge">
              <span>Sejak. 2010</span>
            </div>
            <h2>{{ $firstAbout->title ?? 'Title' }}</h2>
            <p class="lead">{{ $firstAbout->subtitle ?? 'Subtitle' }}</p>
            <p>{{ \Illuminate\Support\Str::limit($firstAbout->description ?? 'Description', 892, '') }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /About Section -->

 
 <!-- Video Section -->
<section id="video-section" class="video section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
 
    <div style="width: 100%; max-height: 500px; overflow: hidden;">
      <video autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover;">
        <source src="{{ asset('../assets-user/video/video-map.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
</section>

  <!-- /Google Maps Section -->

  <!-- Extra About Content (lanjutan) -->
  @foreach($otherAbouts as $about)
    <section id="more-about-{{ $loop->index }}" class="about section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">

          @if($loop->iteration % 2 == 0)
            <!-- Jika genap: text kiri, gambar kanan -->
            <div class="col-lg-7">
              <div class="content-wrapper" data-aos="fade-right" data-aos-delay="200">
                <h2>{{ $about->title }}</h2>
                <p class="lead">{{ $about->subtitle }}</p>
                <p>{{ $about->description }}</p>
              </div>
            </div>
            @if($about->image)
              <div class="col-lg-5">
                <div class="image-stack">
                  <div class="main-image-wrapper" data-aos="fade-left" data-aos-delay="200">
                    <img src="{{ $about->image }}" alt="{{ $about->title }}" class="img-fluid main-image">
                  </div>
                </div>
              </div>
            @endif

          @else
            <!-- Jika ganjil: gambar kiri, text kanan -->
            @if($about->image)
              <div class="col-lg-5">
                <div class="image-stack">
                  <div class="main-image-wrapper" data-aos="fade-right" data-aos-delay="200">
                    <img src="{{ $about->image }}" alt="{{ $about->title }}" class="img-fluid main-image">
                  </div>
                </div>
              </div>
            @endif
            <div class="col-lg-7">
              <div class="content-wrapper" data-aos="fade-left" data-aos-delay="200">
                <h2>{{ $about->title }}</h2>
                <p class="lead">{{ $about->subtitle }}</p>
                <p>{{ $about->description }}</p>
              </div>
            </div>
          @endif

        </div>
      </div>
    </section>
  @endforeach
  <!-- /Extra About Content -->

  <section id="offer-cards" class="offer-cards section">
  </section><!-- /Offer Cards Section -->

</main>

@endsection
