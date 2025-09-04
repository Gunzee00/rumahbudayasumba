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
        <div class="card h-100 shadow-sm border-0" data-aos="zoom-in" data-aos-delay="200">
          
          <!-- Facility Image -->
          @if($facility->image)
            <img src="{{ asset($facility->image) }}" 
                 class="card-img-top" 
                 alt="{{ $facility->name }}" 
                 style="height: 200px; object-fit: cover;">
          @else
            <img src="assets-user/img/hotel/showcase-3.webp" 
                 class="card-img-top" 
                 alt="{{ $facility->name }}" 
                 style="height: 200px; object-fit: cover;">
          @endif

          <!-- Facility Content -->
          <div class="card-body text-center">
            <h5 class="card-title">{{ $facility->name }}</h5>
            <p class="card-text">
              {{ \Illuminate\Support\Str::limit($facility->description, 120, '...') }}
            </p>
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
