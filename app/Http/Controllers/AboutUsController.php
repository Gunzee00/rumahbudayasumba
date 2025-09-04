<?php

namespace App\Http\Controllers;
use Stichoza\GoogleTranslate\GoogleTranslate;

use App\Models\AboutUs;
use App\Models\Footer;
use App\Models\Room;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AboutUsController extends Controller
{

//  public function showUser()
// {
//     $about  = AboutUs::latest()->first();
//     $footer = Footer::first();  
 
//     return view('user.about-us', compact('about', 'footer' ));
// }

public function showUser()
{
    // Ambil data AboutUs
    $abouts = AboutUs::orderBy('created_at', 'asc')->get();
    $firstAbout = $abouts->first(); // untuk ditampilkan di atas sebelum peta
    $otherAbouts = $abouts->skip(1); // sisanya untuk looping setelah peta

    $footer = Footer::first();

    // 🔹 Cek locale aktif
    $locale = session('locale', 'id'); // default Indonesia
    if ($locale != 'id') {
        $tr = new GoogleTranslate($locale);

        // Translate firstAbout
        if ($firstAbout) {
            if (!empty($firstAbout->title))       $firstAbout->title       = $tr->translate($firstAbout->title);
            if (!empty($firstAbout->subtitle))    $firstAbout->subtitle    = $tr->translate($firstAbout->subtitle);
            if (!empty($firstAbout->description)) $firstAbout->description = $tr->translate($firstAbout->description);
        }

        // Translate otherAbouts
        foreach ($otherAbouts as $item) {
            if (!empty($item->title))       $item->title       = $tr->translate($item->title);
            if (!empty($item->subtitle))    $item->subtitle    = $tr->translate($item->subtitle);
            if (!empty($item->description)) $item->description = $tr->translate($item->description);
        }

        // Translate footer
        if ($footer && !empty($footer->address)) {
            $footer->address = $tr->translate($footer->address);
        }
    }

    return view('user.about-us', compact('firstAbout', 'otherAbouts', 'footer'));
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

    

    public function store(Request $request)
{
    $request->validate([
        'image'       => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'title'       => 'required|string|max:150',
        'subtitle'    => 'nullable|string|max:150',
        'description' => 'required|string',
    ]);

    $uploadedFileUrl = null;

    if ($request->hasFile('image')) {
        // Upload image ke Cloudinary hanya jika ada file
        $uploadedFileUrl = Cloudinary::upload(
            $request->file('image')->getRealPath()
        )->getSecurePath();
    }

    AboutUs::create([
        'image'       => $uploadedFileUrl, // bisa null kalau tidak ada gambar
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
