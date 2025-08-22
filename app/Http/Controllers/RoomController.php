<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Footer;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::all();

        // Jika ada query edit, ambil room untuk prefill form
        $editRoom = null;
        if ($request->query('edit')) {
            $editRoom = Room::find($request->query('edit'));
        }

        return view('admin.management-room', compact('rooms', 'editRoom'));
    }
    public function roomDetail($id)
{
    // Ambil room berdasarkan id
    $room = Room::findOrFail($id);

    // Ambil footer untuk layout
    $footer = Footer::first();

    // Kirim ke view user.room-detail
    return view('user.room-detail', compact('room', 'footer'));
}



      public function showUser(Request $request)
    {
        $rooms = Room::all();
       $footer = Footer::first();       
        return view('user.room', compact('rooms','footer'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name_room' => 'required|string|max:100',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'desc' => 'nullable|string',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $imageUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        }

        Room::create([
            'name_room' => $request->name_room,
            'price' => $request->price,
            'image' => $imageUrl,
            'desc' => $request->desc,
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room berhasil dibuat.');
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name_room' => 'required|string|max:100',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'desc' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $room->image = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        }

        $room->name_room = $request->name_room;
        $room->price = $request->price;
        $room->desc = $request->desc;
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room berhasil diupdate.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room berhasil dihapus.');
    }
}
