<?php

namespace App\Http\Controllers;
use Stichoza\GoogleTranslate\GoogleTranslate;

use App\Models\Article;
use App\Models\Footer;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ArticleController extends Controller
{
    // Tampilkan halaman manajemen artikel
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.management-articles', compact('articles'));
    }
    public function articlesshowUser()
{
    $articles = Article::all();
    $footer = Footer::first();

    // 🔹 Cek locale aktif
    $locale = session('locale', 'id'); // default Indonesia
    if ($locale != 'id') {
        $tr = new GoogleTranslate($locale);

        foreach ($articles as $article) {
            if (!empty($article->title))       $article->title       = $tr->translate($article->title);
            if (!empty($article->description)) $article->description = $tr->translate($article->description);
        }

        // Translate hanya address di Footer
        if ($footer && !empty($footer->address)) {
            $footer->address = $tr->translate($footer->address);
        }
    }

    return view('user.articles', compact('articles', 'footer'));
}

    // Simpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            // Upload ke Cloudinary
            $uploadedFileUrl = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'articles']
            )->getSecurePath();

            $data['image'] = $uploadedFileUrl;
        }

        Article::create($data);

        return redirect()->back()->with('success', 'Article berhasil ditambahkan!');
    }

    // Update artikel
    public function update(Request $request, Article $management_article)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            // Upload gambar baru ke Cloudinary
            $uploadedFileUrl = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'articles']
            )->getSecurePath();

            $data['image'] = $uploadedFileUrl;
        }

        $management_article->update($data);

        return redirect()->back()->with('success', 'Article berhasil diperbarui!');
    }

    // Hapus artikel
    public function destroy(Article $management_article)
    {
        // Opsional: hapus juga dari Cloudinary jika simpan public_id
        $management_article->delete();

        return redirect()->back()->with('success', 'Article berhasil dihapus!');
    }
}
