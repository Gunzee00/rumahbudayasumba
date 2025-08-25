<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ContactUs;
use App\Models\User;
 
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        // Hitung jumlah booking ruangan
        $totalBookings = Booking::count();

        // Hitung jumlah user yang booking (unik)
        $totalUsersBooking = Booking::distinct('user_id')->count('user_id');

        // Hitung jumlah pesan (kalau ada tabel messages)
        $totalMessages = ContactUs::count();

        return view('admin.dashboard', compact(
            'totalBookings',
            'totalUsersBooking',
            'totalMessages'
        ));
    }
}
