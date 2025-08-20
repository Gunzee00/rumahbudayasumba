<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    // Tampilkan halaman footer management
    public function index()
    {
        $footers = Footer::all(); // bisa ada lebih dari satu record
        return view('admin.management-footer', compact('footers'));
    }

    // Simpan data footer baru
    public function store(Request $request)
    {
        $request->validate([
            'address'   => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'required|string|max:20',
            'facebook'  => 'nullable|url|max:255',
            'youtube'   => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);

        Footer::create([
            'address'   => $request->address,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'facebook'  => $request->facebook,
            'youtube'   => $request->youtube,
            'instagram' => $request->instagram,
        ]);

        return redirect()->back()->with('success', 'Data footer berhasil ditambahkan');
    }

    // Update footer
    public function update(Request $request, $id)
    {
        $footer = Footer::findOrFail($id);

        $request->validate([
            'address'   => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'required|string|max:20',
            'facebook'  => 'nullable|url|max:255',
            'youtube'   => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);

        $footer->update([
            'address'   => $request->address,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'facebook'  => $request->facebook,
            'youtube'   => $request->youtube,
            'instagram' => $request->instagram,
        ]);

        return redirect()->back()->with('success', 'Data footer berhasil diperbarui');
    }

    // Hapus footer
    public function destroy($id)
    {
        $footer = Footer::findOrFail($id);
        $footer->delete();

        return redirect()->back()->with('success', 'Data footer berhasil dihapus');
    }
}
