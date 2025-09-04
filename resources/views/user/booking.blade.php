@extends('user-layouts.app')

@section('title', 'Booking - Grandoria')

@section('content')
<main class="main">
  <section id="booking" class="section">
    <div class="container">
      <h2 class="mb-4 text-center">Booking Room: {{ $room->name_room }}</h2>

      <div class="card shadow-lg rounded-3">
        <div class="card-body p-4">
          <form action="{{ route('booking.store', $room->id) }}" method="POST">
            @csrf

            <input type="hidden" name="room_id" value="{{ $room->id }}">

            <div class="row g-3">
              <div class="col-md-6">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" required>
              </div>

              <div class="col-md-6">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" required>
              </div>

              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>

              <div class="col-md-6">
                <label for="guest_count" class="form-label">Number of Guests</label>
                <input type="number" name="guest_count" id="guest_count" class="form-control" min="1" required>
              </div>

              <div class="col-md-6">
                <label for="check_in" class="form-label">Check In</label>
                <input type="date" name="check_in" id="check_in" class="form-control" required min="{{ date('Y-m-d') }}">
              </div>

              <div class="col-md-6">
                <label for="check_out" class="form-label">Check Out</label>
                <input type="date" name="check_out" id="check_out" class="form-control" required min="{{ date('Y-m-d') }}">
              </div>

              <div class="col-12">
                <label for="special_request" class="form-label">Special Request</label>
                <textarea name="special_request" id="special_request" class="form-control" rows="3" placeholder="Optional"></textarea>
              </div>
            </div>

            <div class="mt-4 text-center">
              <button type="submit" class="btn btn-success px-4" style="background-color:#7B1E1E; border-color:#7B1E1E; color:#FFFFFF;">Confirm Booking</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>
</main>

{{-- Script validasi tanggal --}}
<script>
document.addEventListener("DOMContentLoaded", function() {
    let checkInInput = document.getElementById("check_in");
    let checkOutInput = document.getElementById("check_out");

    checkInInput.setAttribute("min", new Date().toISOString().split("T")[0]);

    checkInInput.addEventListener("change", function() {
        let checkInDate = new Date(this.value);
        if (this.value) {
            checkInDate.setDate(checkInDate.getDate() + 1);
            checkOutInput.min = checkInDate.toISOString().split("T")[0];
        }
    });

    checkOutInput.addEventListener("change", function() {
        if (checkInInput.value && this.value <= checkInInput.value) {
            alert("Tanggal check-out harus lebih besar dari tanggal check-in!");
            this.value = "";
        }
    });
});
</script>
@endsection
