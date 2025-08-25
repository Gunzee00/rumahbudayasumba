@extends('user-layouts.app')

@section('title', 'My Bookings - Grandoria')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">My Bookings</h2>

    @if($bookings->isEmpty())
        <div class="alert alert-info text-center">
            Kamu belum memiliki booking.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Room</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Total Harga</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Dibuat Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $index => $booking)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $booking->room->name_room ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                            <td><strong>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</strong></td>
                            <td>
                                @if($booking->payment_proof)
                                    <img src="{{ $booking->payment_proof }}" 
                                         alt="Bukti Bayar" 
                                         class="img-thumbnail preview-proof" 
                                         data-bs-toggle="modal" 
                                         data-bs-target="#imageModal" 
                                         data-src="{{ $booking->payment_proof }}"
                                         style="max-width: 120px; max-height: 120px; object-fit: contain; cursor: pointer;">
                                @else
                                    <span class="text-muted">Belum ada</span>
                                @endif
                            </td>
                            <td>
                                @if($booking->status == 'pending')
                                    <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                                @elseif($booking->status == 'confirmed')
                                    <span class="badge bg-success px-3 py-2">Confirmed</span>
                                @elseif($booking->status == 'canceled')
                                    <span class="badge bg-danger px-3 py-2">Canceled</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2">{{ ucfirst($booking->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Modal Bootstrap untuk preview gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
      <div class="modal-body text-center">
        <img id="modalImage" 
             src="" 
             alt="Preview Bukti Pembayaran" 
             class="rounded" 
             style="max-width: 500px; max-height: 500px; width: 100%; height: auto; object-fit: contain;">
      </div>
    </div>
  </div>
</div>

{{-- Script untuk handle preview gambar --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    let modalImage = document.getElementById("modalImage");
    let previewImages = document.querySelectorAll(".preview-proof");

    previewImages.forEach(img => {
        img.addEventListener("click", function () {
            let src = this.getAttribute("data-src");
            modalImage.src = src;
        });
    });
});
</script>
@endsection
