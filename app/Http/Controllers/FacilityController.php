<?php

namespace App\Http\Controllers;
use Stichoza\GoogleTranslate\GoogleTranslate;

use App\Models\Facility;
use App\Models\Footer;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FacilityController extends Controller
{
    // Admin: tampilkan data
    public function index()
    {
        $facilities = Facility::latest()->get();
           
        return view('admin.management-facility', compact('facilities',  ));
    }

    // Simpan facility baru
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            // upload ke cloudinary
            $imageUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        }

        Facility::create([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $imageUrl,
        ]);

        return redirect()->back()->with('success', 'Facility berhasil ditambahkan!');
    }

    // Update facility
    public function update(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $facility->image = $imageUrl;
        }

        $facility->name = $request->name;
        $facility->description = $request->description;
        $facility->save();

        return redirect()->back()->with('success', 'Facility berhasil diperbarui!');
    }

    // Hapus facility
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);

        // kalau mau hapus image di cloudinary bisa tambahin:
        // Cloudinary::destroy(public_id);

        $facility->delete();
        return redirect()->back()->with('success', 'Facility berhasil dihapus!');
    }

    // User: tampilkan fasilitas
    public function showUser()
{
    $facilities = Facility::latest()->get();
    $footer = Footer::first();

    // 🔹 Cek locale aktif
    $locale = session('locale', 'id'); // default Indonesia
    if ($locale != 'id') {
        $tr = new GoogleTranslate($locale);

        // Translate fields Facility yang relevan
        foreach ($facilities as $facility) {
            if (!empty($facility->name))        $facility->name        = $tr->translate($facility->name);
            if (!empty($facility->description)) $facility->description = $tr->translate($facility->description);
        }

        // Translate hanya address di Footer
        if ($footer && !empty($footer->address)) {
            $footer->address = $tr->translate($footer->address);
        }
    }

    return view('user.facility', compact('facilities', 'footer'));
}
}
