<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $request->validate([
            'main_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);

        $path = $request->file('main_image')->store('home_images', 'public');

        Home::create([
            'main_image' => $path,
            'title' => $request->title,
            'desc' => $request->desc,
        ]);

        return redirect()->route('home.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, Home $home)
    {
        $request->validate([
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);

        if ($request->hasFile('main_image')) {
            if ($home->main_image && Storage::disk('public')->exists($home->main_image)) {
                Storage::disk('public')->delete($home->main_image);
            }
            $path = $request->file('main_image')->store('home_images', 'public');
            $home->main_image = $path;
        }

        $home->title = $request->title;
        $home->desc = $request->desc;
        $home->save();

        return redirect()->route('home.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Home $home)
    {
        if ($home->main_image && Storage::disk('public')->exists($home->main_image)) {
            Storage::disk('public')->delete($home->main_image);
        }
        $home->delete();

        return redirect()->route('home.index')->with('success', 'Data berhasil dihapus.');
    }
}
