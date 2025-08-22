@extends('user-layouts.app')

@section('title', 'Booking - Grandoria')

@section('content')
<main class="main">
  <section id="booking" class="section">
    <div class="container">
      <h2 class="mb-4">Booking Room: {{ $room->name_room }}</h2>

     <form action="{{ route('booking.store', $room->id) }}" method="POST" enctype="multipart/form-data">
  @csrf

  <input type="hidden" name="room_id" value="{{ $room->id }}">
  
  <div class="mb-3">
    <label for="check_in" class="form-label">Check In</label>
    <input type="date" name="check_in" id="check_in" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="check_out" class="form-label">Check Out</label>
    <input type="date" name="check_out" id="check_out" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="payment_proof" class="form-label">Upload Payment Proof</label>
    <input type="file" name="payment_proof" id="payment_proof" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-success">Confirm Booking</button>
</form>

    </div>
  </section>
</main>
@endsection
