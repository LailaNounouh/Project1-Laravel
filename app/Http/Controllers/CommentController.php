<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $news_id)
    {
        $data = $request->validate([
            'body' => 'required|string|min:3'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'news_id' => $news_id,
            'body' => $data['body'],
        ]);

        return back();
    }
}
