<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get(); // Fetch all articles, ordering by the latest first

        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create_article');
    }

    public function store(Request $request)
    {

        $article = new Article([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
        ]);

        $article->save();

        return redirect()->route('home')->with('success', 'Article created successfully');
    }

    public function show(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('article.index')->with('success', 'Article updated successfully');
    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
}
