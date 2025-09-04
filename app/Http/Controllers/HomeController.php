<?php

namespace App\Http\Controllers;
use Stichoza\GoogleTranslate\GoogleTranslate;

use App\Models\Home;
use App\Models\SubHome;
use App\Models\News;
use App\Models\Footer;
use App\Models\Galeri;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('admin.admin-dashboard');
    }

    public function index()
    {
        $homes = Home::all();
        return view('admin.management-home', compact('homes'));
    }

public function showUser()
{
    // Ambil data
    $home = Home::first(); 
    $subhome = SubHome::first(); 
    $news = News::latest()->take(6)->get(); 
    $galeri = Galeri::latest()->take(10)->get(); 
    $footer = Footer::first(); 

    // Cek locale aktif
    $locale = session('locale', 'id'); // default Indonesia
    $tr = new GoogleTranslate($locale);

    // Translate data utama (jika locale != id)
    if ($locale != 'id') {
        if ($home) {
            if (!empty($home->title)) $home->title = $tr->translate($home->title);
            if (!empty($home->desc))  $home->desc  = $tr->translate($home->desc);
        }

        if ($subhome) {
            if (!empty($subhome->title)) $subhome->title = $tr->translate($subhome->title);
            if (!empty($subhome->sub_title)) $subhome->sub_title = $tr->translate($subhome->sub_title);
            if (!empty($subhome->description))  $subhome->description  = $tr->translate($subhome->description);
        }

        foreach ($news as $item) {
            if (!empty($item->title))   $item->title   = $tr->translate($item->title);
            if (!empty($item->content)) $item->content = $tr->translate($item->content);
        }

        if ($footer) {
            if (!empty($footer->address)) $footer->address = $tr->translate($footer->address);
        }
    }

    // Kirim ke view
    return view('dashboard', compact('home', 'subhome', 'news', 'galeri', 'footer'));
}



    public function store(Request $request)
    {
        $request->validate([
            'main_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title'      => 'required|string|max:255',
            'desc'       => 'required|string',
        ]);

        // Upload ke Cloudinary
        $uploadedFileUrl = Cloudinary::upload($request->file('main_image')->getRealPath())->getSecurePath();

        Home::create([
            'main_image' => $uploadedFileUrl,
            'title'      => $request->title,
            'desc'       => $request->desc,
        ]);

        return redirect()->route('home.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title'      => 'required|string|max:255',
            'desc'       => 'required|string',
        ]);

        $home = Home::findOrFail($id);

        if ($request->hasFile('main_image')) {
            // Hapus image lama jika ingin (opsional, bisa menggunakan Cloudinary delete API)
            
            $uploadedFileUrl = Cloudinary::upload($request->file('main_image')->getRealPath())->getSecurePath();
            $home->main_image = $uploadedFileUrl;
        }

        $home->title = $request->title;
        $home->desc  = $request->desc;
        $home->save();

        return redirect()->route('home.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $home = Home::findOrFail($id);

        // Jika mau hapus gambar di Cloudinary juga, bisa pakai Cloudinary destroy API

        $home->delete();

        return redirect()->route('home.index')->with('success', 'Data berhasil dihapus.');
    }
}
