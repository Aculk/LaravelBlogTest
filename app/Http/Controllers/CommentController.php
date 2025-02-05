<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'content' => 'required|min:5|max:1000',
        ]);

        Comment::create([
            'article_id' => $article->id,
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Комментарий добавлен');
    }
}
