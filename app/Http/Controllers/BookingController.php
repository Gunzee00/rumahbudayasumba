<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Mail\BookingCreatedMail;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Tampilkan daftar booking (khusus admin).
     */
    public function index()
    {
        $bookings = Booking::with([ 'room'])->latest()->get();
        return view('admin.management-booking', compact('bookings'));
    }

    /**
     * Proses user membuat booking baru.
     */
    
public function store(Request $request, $roomId)
{
    $room = Room::findOrFail($roomId);

    $request->validate([
        'customer_name'    => 'required|string|max:100',
        'phone_number'     => 'required|string|max:20',
        'email'            => 'required|email|max:100',
        'check_in'         => 'required|date|after_or_equal:today',
        'check_out'        => 'required|date|after:check_in',
        'guest_count'      => 'required|integer|min:1',
        'special_request'  => 'nullable|string',
    ]);

    $days = (new \DateTime($request->check_in))
        ->diff(new \DateTime($request->check_out))
        ->days;

    $totalPrice = $room->price * $days;

    $booking = Booking::create([
        'customer_name'   => $request->customer_name,
        'phone_number'    => $request->phone_number,
        'email'           => $request->email,
        'room_id'         => $room->id,
        'check_in'        => $request->check_in,
        'check_out'       => $request->check_out,
        'total_price'     => $totalPrice,
        'guest_count'     => $request->guest_count,
        'special_request' => $request->special_request,
        'status'          => 'pending',
    ]);

    // kirim email ke user
    Mail::to($booking->email)->send(new BookingCreatedMail($booking));

    return redirect()->route('user.home')
        ->with('success', 'Booking berhasil dibuat. Detail order sudah dikirim ke email Anda.');
}


    /**
     * Admin mengubah status booking (acc / tolak).
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', 'Status booking berhasil diperbarui.');
    }

    /**
 * Admin menyetujui booking.
 */
public function approve($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'confirmed';
    $booking->save();

    return back()->with('success', 'Booking berhasil disetujui.');
}

/**
 * Admin menolak booking.
 */
public function reject($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'canceled';
    $booking->save();

    return back()->with('success', 'Booking berhasil ditolak.');
}

/**
 * Admin membatalkan approve (kembalikan ke pending).
 */
public function revertApproval($id)
{
    $booking = Booking::findOrFail($id);

    // Hanya bisa dibatalkan kalau status sekarang "confirmed"
    if ($booking->status !== 'confirmed') {
        return back()->with('error', 'Hanya booking yang sudah disetujui yang bisa dibatalkan.');
    }

    $booking->status = 'pending';
    $booking->save();

    return back()->with('success', 'Approve booking berhasil dibatalkan (kembali ke pending).');
}


    /**
     * User bisa lihat daftar booking miliknya.
     */
    public function myBookings(Request $request)
{
    $query = Booking::with('room')->latest();

    // filter berdasarkan email atau nomor telepon (opsional)
    if ($request->has('email')) {
        $query->where('email', $request->email);
    }
    if ($request->has('phone_number')) {
        $query->where('phone_number', $request->phone_number);
    }

    $bookings = $query->get();
    $footer = Footer::first();

    return view('user.booking-order', compact('bookings', 'footer'));
}


    public function create($roomId)
{
    $room = Room::findOrFail($roomId);
    $footer = Footer::first();  
    return view('user.booking', compact('room', 'footer'));
}

}
