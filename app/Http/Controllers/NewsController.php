<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Publiek: lijst
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    // Publiek: detail
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    // Admin: nieuw formulier
    public function create()
    {
        return view('news.create');
    }

    // Admin: opslaan
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => ['required','string','max:255'],
            'content' => ['required','string'],
            'image'   => ['nullable','image','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $data['user_id'] = Auth::id();

        News::create($data);

        return redirect()->route('news.index')->with('success', 'Nieuws aangemaakt.');
    }

    // Admin: bewerk formulier
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    // Admin: bijwerken
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title'   => ['required','string','max:255'],
            'content' => ['required','string'],
            'image'   => ['nullable','image','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('news.show', $news)->with('success', 'Nieuws bijgewerkt.');
    }

    // Admin: verwijderen
    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('news.index')->with('success', 'Nieuws verwijderd.');
    }
}
