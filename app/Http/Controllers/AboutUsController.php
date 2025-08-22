<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Footer;
use App\Models\Room;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AboutUsController extends Controller
{

 public function showUser()
{
    $about  = AboutUs::latest()->first();
    $footer = Footer::first();  
  $rooms = Room::all();
    return view('user.about-us', compact('about', 'footer', 'rooms'));
}

    // Tampilkan semua data About Us
    public function index()
    {
        $abouts = AboutUs::latest()->get();
        return view('admin.management-aboutus', compact('abouts'));
    }

    // Form tambah data (opsional, bisa di modal di halaman index)
    public function create()
    {
        return view('admin.create-aboutus'); // buat view terpisah jika perlu
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'image'       => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title'       => 'required|string|max:150',
            'subtitle'    => 'nullable|string|max:150',
            'description' => 'required|string',
        ]);

        // Upload image ke Cloudinary
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();

        AboutUs::create([
            'image'       => $uploadedFileUrl,
            'title'       => $request->title,
            'subtitle'    => $request->subtitle,
            'description' => $request->description,
        ]);

        return redirect()->route('about.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Form edit data (opsional, bisa di modal di halaman index)
    public function edit($id)
    {
        $about = AboutUs::findOrFail($id);
        return view('admin.edit-aboutus', compact('about')); // buat view terpisah jika perlu
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'image'       => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title'       => 'required|string|max:150',
            'subtitle'    => 'nullable|string|max:150',
            'description' => 'required|string',
        ]);

        $about = AboutUs::findOrFail($id);

        if ($request->hasFile('image')) {
            // Upload image baru ke Cloudinary
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $about->image = $uploadedFileUrl;
        }

        $about->title       = $request->title;
        $about->subtitle    = $request->subtitle;
        $about->description = $request->description;
        $about->save();

        return redirect()->route('about.index')->with('success', 'Data berhasil diupdate.');
    }

    // Hapus data
    public function destroy($id)
    {
        $about = AboutUs::findOrFail($id);

        // Jika ingin, bisa juga hapus image di Cloudinary menggunakan API destroy

        $about->delete();

        return redirect()->route('about.index')->with('success', 'Data berhasil dihapus.');
    }
}
