<?php

namespace App\Http\Controllers;

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
    return view('admin.subhome.show', compact('subhome'));
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
