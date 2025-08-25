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
          <input type="date" name="check_in" id="check_in" class="form-control" required min="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-3">
          <label for="check_out" class="form-label">Check Out</label>
          <input type="date" name="check_out" id="check_out" class="form-control" required min="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-3">
          <label for="payment_proof" class="form-label">Upload Payment Proof</label>
          <input type="file" name="payment_proof" id="payment_proof" class="form-control" accept="image/*" required>
         <!-- Preview Gambar -->
<div class="mt-3">
  <img id="preview-image" src="" alt="Preview Payment Proof" 
       style="max-width: 400px; max-height: 400px; width: auto; height: auto; display: none; border: 1px solid #ddd; padding: 5px; border-radius: 5px; object-fit: contain;">
</div>
        <button type="submit" class="btn btn-success">Confirm Booking</button>
      </form>
    </div>
  </section>
</main>

{{-- Script untuk validasi tanggal dan preview gambar --}}
<script>
document.addEventListener("DOMContentLoaded", function() {
    let checkInInput = document.getElementById("check_in");
    let checkOutInput = document.getElementById("check_out");
    let fileInput = document.getElementById("payment_proof");
    let previewImage = document.getElementById("preview-image");

    // Default: minimal hari ini
    checkInInput.setAttribute("min", new Date().toISOString().split("T")[0]);

    checkInInput.addEventListener("change", function() {
        // Kalau pilih check-in, maka check-out minimal besoknya
        let checkInDate = new Date(this.value);
        if (this.value) {
            checkInDate.setDate(checkInDate.getDate() + 1);
            checkOutInput.min = checkInDate.toISOString().split("T")[0];
        }
    });

    checkOutInput.addEventListener("change", function() {
        // Pastikan check-out lebih besar dari check-in
        if (checkInInput.value && this.value <= checkInInput.value) {
            alert("Tanggal check-out harus lebih besar dari tanggal check-in!");
            this.value = "";
        }
    });

    // Preview gambar sebelum upload
    fileInput.addEventListener("change", function(event) {
        let file = event.target.files[0];
        if (file && file.type.startsWith("image/")) {
            let reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = "none";
            previewImage.src = "";
        }
    });
});
</script>
@endsection
