<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Article;

class CommentController extends Controller
{
    public function create($articleId)
    {
        $article = Article::findOrFail($articleId);
        return view('comments.create', compact('article'));
    }

    public function store(Request $request, $article_id)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        Comment::create([
            'article_id' => $article_id,
            'user_id' => auth()->id(), // Assuming you have authentication set up
            'content' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
