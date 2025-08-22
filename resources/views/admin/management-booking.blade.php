@extends('admin-layouts.app')

@section('title', 'Management Booking')
@section('page-title', 'Management Booking')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Booking</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
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
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->user->username }}</td>
                    <td>{{ $booking->room->name_room }}</td>
                    <td>{{ $booking->check_in }}</td>
                    <td>{{ $booking->check_out }}</td>
                    <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ $booking->payment_proof }}" target="_blank">
                            <img src="{{ $booking->payment_proof }}" alt="Bukti Pembayaran" width="80">
                        </a>
                    </td>
                    <td>
                        <span class="badge 
                            @if($booking->status == 'pending') bg-warning 
                            @elseif($booking->status == 'confirmed') bg-success 
                            @else bg-danger @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('booking.updateStatus', $booking->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada booking</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
