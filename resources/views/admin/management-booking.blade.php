@extends('admin-layouts.app')

@section('title', 'Management Booking')
@section('page-title', 'Management Booking')

@section('content')
<div class="row">
  <div class="col-lg-12">

    {{-- Alert Message --}}
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Card Daftar Booking --}}
    @forelse($bookings as $index => $booking)
      <div class="card mb-3 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span><strong>Booking #{{ $index + 1 }}</strong></span>
          {{-- <span class="badge 
            @if($booking->status == 'pending') bg-warning text-dark
            @elseif($booking->status == 'confirmed') bg-success
            @elseif($booking->status == 'canceled') bg-danger
            @else bg-secondary @endif">
            {{ ucfirst($booking->status) }}
          </span> --}}
        </div>
        <div class="card-body">
          <p><strong>Customer:</strong> {{ $booking->customer_name }}</p>
          <p><strong>Phone:</strong> {{ $booking->phone_number }}</p>
          <p><strong>Email:</strong> {{ $booking->email }}</p>
          <hr>
          <p><strong>Room:</strong> {{ $booking->room->name_room }}</p>
          <p><strong>Stay:</strong> 
            {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }} - 
            {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}
          </p>
          <p><strong>Total Price:</strong> Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
          <p><strong>Guest:</strong> {{ $booking->guest_count }} Orang</p>
          <p><strong>Special Request:</strong> {{ $booking->special_request ?? '-' }}</p>
        </div>
        <div class="card-footer">
          @if($booking->status == 'pending')
              {{-- <form action="{{ route('admin.management-booking.approve', $booking->id) }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-success btn-sm">Approve</button>
              </form>

              <form action="{{ route('admin.management-booking.reject', $booking->id) }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm">Reject</button>
              </form> --}}
          @elseif($booking->status == 'confirmed')
              <form action="{{ route('admin.management-booking.revert', $booking->id) }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-warning btn-sm">Batalkan Approve</button>
              </form>
          @else
              <span class="text-muted">Tidak ada aksi</span>
          @endif
        </div>
      </div>
    @empty
      <div class="alert alert-info text-center">Belum ada booking</div>
    @endforelse

  </div>
</div>
@endsection
