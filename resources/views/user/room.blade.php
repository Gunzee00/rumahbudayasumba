@extends('user-layouts.app')

@section('title', 'Home - Grandoria')

@section('content')
<main class="main">

  <!-- Rooms 2 Section -->  
  <section id="rooms-2" class="rooms-2 section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="rooms-grid" data-aos="fade-up" data-aos-delay="300">
        <div class="row g-4">
          @forelse($rooms as $room)
            <div class="col-xl-4 col-lg-6">

              <!-- Seluruh card clickable -->
              <a href="{{ route('room.detail', $room->id) }}" class="room-card d-block text-decoration-none text-dark h-100">
                
                <!-- Room Image -->
                <div class="room-image">
                  @if($room->image)
                    <img src="{{ $room->image }}" alt="{{ $room->name_room }}" class="img-fluid rounded">
                  @else
                    <img src="assets-user/img/hotel/room-1.webp" alt="{{ $room->name_room }}" class="img-fluid rounded">
                  @endif
                </div>

                <!-- Room Content -->
                <div class="room-content p-3">
                  <div class="room-header mb-2">
                    <h3 class="h5">{{ $room->name_room }}</h3>
                  </div>

                  <p class="room-description mb-3">
                    {{ \Illuminate\Support\Str::limit($room->desc, 20, '...') }}
                  </p>

                  <div class="room-footer d-flex justify-content-between align-items-center">
                    <div class="room-price">
                      <span class="price-from">From</span>
                      <span class="price-amount">${{ number_format($room->price, 0, ',', '.') }}</span>
                      <span class="price-period">/ night</span>
                    </div>
                  <span
  class="btn-room-details btn btn-primary btn-sm"
  role="button"
  tabindex="0"
  onclick="event.preventDefault(); event.stopPropagation(); window.location.href='{{ route('booking.create', $room->id) }}';"
  onkeydown="if(event.key==='Enter'||event.key===' '){ event.preventDefault(); event.stopPropagation(); window.location.href='{{ route('booking.create', $room->id) }}'; }"
>
  Book Now
</span>

                  </div>
                </div>

              </a><!-- End Room Card -->

            </div>
          @empty
            <div class="col-12 text-center">
              <p>Belum ada room tersedia.</p>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </section><!-- /Rooms 2 Section -->

</main>
@endsection
