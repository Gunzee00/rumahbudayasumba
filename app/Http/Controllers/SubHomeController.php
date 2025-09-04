<?php

namespace App\Http\Controllers;
use Stichoza\GoogleTranslate\GoogleTranslate;

use App\Models\SubHome;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SubHomeController extends Controller
{
    /**
     * Tampilkan semua data ke view
     */

public function show($id)
{
    $subhome = SubHome::findOrFail($id);
    $subhomes = SubHome::all(); // tetap dikirim ke view

    // 🔹 Hanya translate kalau dibutuhkan (misal di halaman user)
    $locale = session('locale', 'id'); // default Indonesia
    if ($locale != 'id') {
        $tr = new GoogleTranslate($locale);

        if (!empty($subhome->title))      $subhome->title      = $tr->translate($subhome->title);
        if (!empty($subhome->sub_title))  $subhome->sub_title  = $tr->translate($subhome->sub_title);
        if (!empty($subhome->description)) $subhome->description = $tr->translate($subhome->description);

        foreach ($subhomes as $item) {
            if (!empty($item->title))       $item->title       = $tr->translate($item->title);
            if (!empty($item->sub_title))   $item->sub_title   = $tr->translate($item->sub_title);
            if (!empty($item->description)) $item->description = $tr->translate($item->description);
        }
    }

    return view('admin.management-subhome', compact('subhome', 'subhomes'));
}

    public function index()
    {
        $subhomes = SubHome::all();
        return view('admin.management-subhome', compact('subhomes'));
    }
 

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload image1
        if ($request->hasFile('image1')) {
            $upload1 = Cloudinary::upload($request->file('image1')->getRealPath(), [
                'folder' => 'subhome'
            ]);
            $validated['image1'] = $upload1->getSecurePath();
        }

        // Upload image2
        if ($request->hasFile('image2')) {
            $upload2 = Cloudinary::upload($request->file('image2')->getRealPath(), [
                'folder' => 'subhome'
            ]);
            $validated['image2'] = $upload2->getSecurePath();
        }

        SubHome::create($validated);

        return redirect()->route('subhome.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        $subHome = SubHome::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload image1 baru (jika ada)
        if ($request->hasFile('image1')) {
            $upload1 = Cloudinary::upload($request->file('image1')->getRealPath(), [
                'folder' => 'subhome'
            ]);
            $validated['image1'] = $upload1->getSecurePath();
        } else {
            $validated['image1'] = $subHome->image1; // tetap pakai yang lama
        }

        // Upload image2 baru (jika ada)
        if ($request->hasFile('image2')) {
            $upload2 = Cloudinary::upload($request->file('image2')->getRealPath(), [
                'folder' => 'subhome'
            ]);
            $validated['image2'] = $upload2->getSecurePath();
        } else {
            $validated['image2'] = $subHome->image2;
        }

        $subHome->update($validated);

        return redirect()->route('subhome.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        $subHome = SubHome::findOrFail($id);
        $subHome->delete();

        return redirect()->route('subhome.index')->with('success', 'Data berhasil dihapus.');
    }
}
