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
    <div class="card">
      <div class="card-header">Daftar Booking</div>
      <div class="card-body">
        <table class="table table-bordered align-middle">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>User</th>
              <th>Kamar</th>
              <th>Check-in</th>
              <th>Check-out</th>
              <th>Total Harga</th>
              <th>Bukti Pembayaran</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($bookings as $index => $booking)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $booking->user->username ?? $booking->user->name }}</td>
                <td>{{ $booking->room->name_room }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                <td>
                  <a href="{{ $booking->payment_proof }}" target="_blank">
                    <img src="{{ $booking->payment_proof }}" width="80" class="img-thumbnail">
                  </a>
                </td>
                <td>
                  <span class="badge 
                    @if($booking->status == 'pending') bg-warning text-dark
                    @elseif($booking->status == 'confirmed') bg-success
                    @elseif($booking->status == 'canceled') bg-danger
                    @else bg-secondary @endif">
                    {{ ucfirst($booking->status) }}
                  </span>
                </td>
              <td>
  @if($booking->status == 'pending')
      {{-- Tombol Approve --}}
      <form action="{{ route('admin.management-booking.approve', $booking->id) }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-success btn-sm">Approve</button>
      </form>

      {{-- Tombol Reject --}}
      <form action="{{ route('admin.management-booking.reject', $booking->id) }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-danger btn-sm">Reject</button>
      </form>
  @elseif($booking->status == 'confirmed')
      {{-- Tombol Batalkan Approve --}}
      <form action="{{ route('admin.management-booking.revert', $booking->id) }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-warning btn-sm">Batalkan Approve</button>
      </form>
  @else
      <span class="text-muted">Tidak ada aksi</span>
  @endif
</td>

              </tr>
            @empty
              <tr>
                <td colspan="9" class="text-center">Belum ada booking</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
@endsection
