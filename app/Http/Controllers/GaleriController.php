<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Tampilkan semua galeri
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('admin.management-galeri', compact('galeri'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('galeri', 'public');

        Galeri::create([
            'image'   => $path,
            'caption' => $request->caption,
        ]);

        return redirect()->back()->with('success', 'Gambar berhasil ditambahkan');
    }

    // Update data
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('galeri', 'public');
            $galeri->image = $path;
        }

        if ($request->caption !== null) {
            $galeri->caption = $request->caption;
        }

        $galeri->save();

        return redirect()->back()->with('success', 'Gambar berhasil diperbarui');
    }

    // Hapus data
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus');
    }
}
