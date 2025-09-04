<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua booking dengan relasi room
        $bookings = Booking::with('room')->get();

        // Format data booking ke event FullCalendar
        $events = [];
        foreach ($bookings as $booking) {
            $events[] = [
                'title' => $booking->customer_name . ' - ' . $booking->room->name_room,
                'start' => $booking->check_in,
                'end'   => $booking->check_out,
                'url'   => route('admin.management-booking', $booking->id), // klik tanggal → detail booking
            ];
        }

        return view('admin.admin-dashboard', compact('events'));
    }
}
