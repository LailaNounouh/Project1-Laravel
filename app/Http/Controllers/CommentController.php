<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\News;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required|string|min:3',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'news_id' => $news->id,
            'body' => $request->content,
        ]);

        return back();
    }
}
