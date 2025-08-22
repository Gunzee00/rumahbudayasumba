@extends('user-layouts.app')

@section('title', 'My Bookings - Grandoria')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">My Bookings</h2>

    @if($bookings->isEmpty())
        <div class="alert alert-info">
            Kamu belum memiliki booking.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Room</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Status</th>
                        <th>Dibuat Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $index => $booking)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $booking->room->name ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                            <td>
                                @if($booking->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($booking->status == 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif($booking->status == 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($booking->status) }}</span>
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
@endsection
