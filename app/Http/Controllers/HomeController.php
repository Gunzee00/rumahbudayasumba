<?php

namespace App\Http\Controllers;

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
    // Ambil data pertama dari tabel home
    $home = Home::first(); 
    $subhome = SubHome::first(); 
    $news = News::latest()->take(6)->get(); // ambil max 6 berita terbaru
    $galeri = Galeri::latest()->take(10)->get(); // ambil max 10 gambar
    $footer = Footer::first(); // ambil data footer (biasanya cuma 1 record)

    // Kirim ke view user (dashboard.blade.php)
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
