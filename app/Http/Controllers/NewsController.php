<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = \App\Models\News::latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    public function show(\App\Models\News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news_images');
        }

        $data['user_id'] = Auth::id();

        News::create($data);

        return redirect()->route('news.index')->with('success', 'Nieuwsitem aangemaakt.');
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news_images');
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'Nieuwsitem bijgewerkt.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Nieuwsitem verwijderd.');
    }
}
