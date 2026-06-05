<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view(
            'student.article.index',
            compact('articles')
        );
    }

    public function show(Article $article)
    {
        return view(
            'student.article.show',
            compact('article')
        );
    }
}
