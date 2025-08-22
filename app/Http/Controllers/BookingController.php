<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BookingController extends Controller
{
    /**
     * Tampilkan daftar booking (khusus admin).
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'room'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Proses user membuat booking baru.
     */
     public function store(Request $request, $roomId)
{
    // Ambil data room
    $room = Room::findOrFail($roomId);

    // Validasi input
    $request->validate([
        'check_in'      => 'required|date|after_or_equal:today',
        'check_out'     => 'required|date|after:check_in',
        'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Hitung jumlah hari
    $days = (new \DateTime($request->check_in))
        ->diff(new \DateTime($request->check_out))
        ->days;

    // Hitung total harga
    $totalPrice = $room->price * $days;

    // Upload bukti pembayaran ke Cloudinary
    $uploadedFileUrl = Cloudinary::upload(
        $request->file('payment_proof')->getRealPath(),
        ['folder' => 'booking_proofs']
    )->getSecurePath();

    // Simpan data booking
    Booking::create([
        'user_id'       => Auth::id(),
        'room_id'       => $room->id,
        'check_in'      => $request->check_in,
        'check_out'     => $request->check_out,
        'total_price'   => $totalPrice,
        'payment_proof' => $uploadedFileUrl,
        'status'        => 'pending',
    ]);

    return redirect()->route('user.home')
        ->with('success', 'Booking berhasil dibuat dan menunggu konfirmasi.');
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
     * User bisa lihat daftar booking miliknya.
     */
    public function myBookings()
    {
        $bookings = Booking::with('room')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.booking-order', compact('bookings'));
    }

    public function create($roomId)
{
    $room = Room::findOrFail($roomId);
    return view('user.booking', compact('room'));
}

}
