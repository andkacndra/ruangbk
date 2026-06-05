<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view(
            'admin.articles.index',
            compact('articles')
        );
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // generate slug unik
        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;
        $count = 1;

        while (Article::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        Article::create([
            'title' => $request->title,
            'slug' => $slug,
            'category' => 'Kesehatan Mental',
            'content' => $request->content,
        ]);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit(Article $article)
    {
        return view(
            'admin.articles.edit',
            compact('article')
        );
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category' => 'Kesehatan Mental',
            'content' => $request->content,
        ]);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return back()
            ->with('success', 'Artikel berhasil dihapus');
    }
}
