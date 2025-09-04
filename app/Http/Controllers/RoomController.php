<?php

namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\Room;
use App\Models\Footer;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::all();
        $editRoom = null;

        if ($request->query('edit')) {
            $editRoom = Room::find($request->query('edit'));
        }

        return view('admin.management-room', compact('rooms', 'editRoom'));
    }

    public function roomDetail($id)
    {
        $room = Room::findOrFail($id);
        $footer = Footer::first();

        return view('user.room-detail', compact('room', 'footer'));
    }

    public function showUser(Request $request)
    {
        $rooms = Room::all();
        $footer = Footer::first();

        $locale = session('locale', 'id');
        if ($locale != 'id') {
            $tr = new GoogleTranslate($locale);

            foreach ($rooms as $room) {
                // 🔹 Field yang akan diterjemahkan
                $translatableFields = [
                    'name_room', 'desc',
                    'fasilitas1', 'fasilitas2', 'fasilitas3',
                    'fasilitas4', 'fasilitas5',
                    'fasilitas6', 'fasilitas7', 'fasilitas8',
                    'fasilitas9', 'fasilitas10',
                ];

                foreach ($translatableFields as $field) {
                    if (!empty($room->$field)) {
                        $room->$field = $tr->translate($room->$field);
                    }
                }
            }

            if ($footer && !empty($footer->address)) {
                $footer->address = $tr->translate($footer->address);
            }
        }

        return view('user.room', compact('rooms', 'footer'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name_room'    => 'required|string|max:100',
            'price'        => 'required',
            'jumlah_kamar' => 'required|integer|min:1',
            'jumlah_tamu'  => 'required|integer|min:1',

            // 🔹 Validasi gambar
            'image1'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image2'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image3'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image4'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image5'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image6'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image7'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image8'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image9'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image10'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            // 🔹 Validasi fasilitas
            'fasilitas1'   => 'nullable|string|max:255',
            'fasilitas2'   => 'nullable|string|max:255',
            'fasilitas3'   => 'nullable|string|max:255',
            'fasilitas4'   => 'nullable|string|max:255',
            'fasilitas5'   => 'nullable|string|max:255',
            'fasilitas6'   => 'nullable|string|max:255',
            'fasilitas7'   => 'nullable|string|max:255',
            'fasilitas8'   => 'nullable|string|max:255',
            'fasilitas9'   => 'nullable|string|max:255',
            'fasilitas10'  => 'nullable|string|max:255',

            'desc'         => 'nullable|string',
        ]);

        $data = $request->only([
            'name_room', 'desc', 'jumlah_kamar', 'jumlah_tamu',
            'fasilitas1','fasilitas2','fasilitas3','fasilitas4','fasilitas5',
            'fasilitas6','fasilitas7','fasilitas8','fasilitas9','fasilitas10',
        ]);

        // 🔹 Hapus titik dari price agar tetap numeric
        $data['price'] = preg_replace('/\D/', '', $request->price);

        // 🔹 Upload gambar ke Cloudinary
        foreach (['image1','image2','image3','image4','image5','image6','image7','image8','image9','image10'] as $img) {
            if ($request->hasFile($img)) {
                $data[$img] = Cloudinary::upload($request->file($img)->getRealPath())->getSecurePath();
            }
        }

        Room::create($data);

        return redirect()->route('rooms.index')->with('success', 'Room berhasil dibuat.');
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name_room'    => 'required|string|max:100',
            'price'        => 'required',
            'jumlah_kamar' => 'required|integer|min:1',
            'jumlah_tamu'  => 'required|integer|min:1',

            // 🔹 Validasi gambar
            'image1'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image2'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image3'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image4'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image5'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image6'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image7'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image8'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image9'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image10'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            // 🔹 Validasi fasilitas
            'fasilitas1'   => 'nullable|string|max:255',
            'fasilitas2'   => 'nullable|string|max:255',
            'fasilitas3'   => 'nullable|string|max:255',
            'fasilitas4'   => 'nullable|string|max:255',
            'fasilitas5'   => 'nullable|string|max:255',
            'fasilitas6'   => 'nullable|string|max:255',
            'fasilitas7'   => 'nullable|string|max:255',
            'fasilitas8'   => 'nullable|string|max:255',
            'fasilitas9'   => 'nullable|string|max:255',
            'fasilitas10'  => 'nullable|string|max:255',

            'desc'         => 'nullable|string',
        ]);

        $room->fill($request->only([
            'name_room', 'desc', 'jumlah_kamar', 'jumlah_tamu',
            'fasilitas1','fasilitas2','fasilitas3','fasilitas4','fasilitas5',
            'fasilitas6','fasilitas7','fasilitas8','fasilitas9','fasilitas10',
        ]));

        // 🔹 Hapus titik dari price
        $room->price = preg_replace('/\D/', '', $request->price);

        // 🔹 Upload gambar baru (jika ada)
        foreach (['image1','image2','image3','image4','image5','image6','image7','image8','image9','image10'] as $img) {
            if ($request->hasFile($img)) {
                $room->$img = Cloudinary::upload($request->file($img)->getRealPath())->getSecurePath();
            }
        }

        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room berhasil diupdate.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room berhasil dihapus.');
    }
}
