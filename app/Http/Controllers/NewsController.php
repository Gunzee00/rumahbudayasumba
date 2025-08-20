<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Tampilkan semua news
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.management-news', compact('news'));
    }

    // Simpan news baru
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'desc'  => 'required|string',
        ]);

        $path = $request->file('image')->store('news', 'public');

        News::create([
            'image' => $path,
            'title' => $request->title,
            'desc'  => $request->desc,
        ]);

        return redirect()->back()->with('success', 'News berhasil ditambahkan');
    }

    // Update news
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'desc'  => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            // hapus gambar lama
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }
            $news->image = $request->file('image')->store('news', 'public');
        }

        $news->title = $request->title;
        $news->desc  = $request->desc;
        $news->save();

        return redirect()->back()->with('success', 'News berhasil diperbarui');
    }

    // Hapus news
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // hapus gambar lama
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->back()->with('success', 'News berhasil dihapus');
    }
}
