@extends('user-layouts.app')

@section('title', 'Facilities')

@section('content')

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span class="description-title">Our Facilities</span>
    <h2>Our Facilities</h2>
    <p>Kami menyediakan berbagai fasilitas terbaik untuk kenyamanan Anda</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4">
      @forelse($facilities as $facility)
        <div class="col-lg-4 col-md-6">
          <div class="offer-card h-100" data-aos="zoom-in" data-aos-delay="200">
            <div class="room-card d-block text-decoration-none text-dark h-100">

              <!-- Facility Image -->
              <div class="offer-image text-center">
                @if($facility->image)
                  <img src="{{ asset($facility->image) }}" alt="{{ $facility->name }}" 
                       class="img-fluid rounded" 
                       style="max-height: 200px; object-fit: cover; width: 100%;">
                @else
                  <img src="assets-user/img/hotel/showcase-3.webp" alt="{{ $facility->name }}" 
                       class="img-fluid rounded" 
                       style="max-height: 200px; object-fit: cover; width: 100%;">
                @endif
              </div>

              <!-- Facility Content -->
              <div class="offer-content p-3">
                <h5 class="mb-2">{{ $facility->name }}</h5>
                <p class="mb-0">
                  {{ \Illuminate\Support\Str::limit($facility->description, 120, '...') }}
                </p>
              </div>

            </div>
          </div>
        </div>
      @empty
        <div class="col-12">
          <p class="text-center">Belum ada fasilitas yang tersedia.</p>
        </div>
      @endforelse
    </div>
  </div>
@endsection
