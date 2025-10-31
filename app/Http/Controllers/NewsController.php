<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Publiek
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    // Publiek
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    // Admin
    public function create()
    {
        $this->authorizeAdmin();
        return view('news.create');
    }

    // Admin
    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $data = $request->validate([
            'title'   => ['required','string','max:255'],
            'content' => ['required','string'],
            'image'   => ['nullable','image','max:4096'], // 4MB
        ]);

        // upload (optioneel)
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $data['user_id'] = Auth::id();

        News::create($data);

        return redirect()->route('news.index')->with('success', 'Nieuwsitem aangemaakt.');
    }

    // Admin
    public function edit(News $news)
    {
        $this->authorizeAdmin();
        return view('news.edit', compact('news'));
    }

    // Admin
    public function update(Request $request, News $news)
    {
        $this->authorizeAdmin();

        $data = $request->validate([
            'title'   => ['required','string','max:255'],
            'content' => ['required','string'],
            'image'   => ['nullable','image','max:4096'],
        ]);

        if ($request->hasFile('image')) {
            // oude image verwijderen (als hij bestond)
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news','public');
        }

        $news->update($data);

        return redirect()->route('news.show', $news)->with('success', 'Nieuwsitem bijgewerkt.');
    }

    // Admin
    public function destroy(News $news)
    {
        $this->authorizeAdmin();

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Nieuwsitem verwijderd.');
    }

    private function authorizeAdmin(): void
    {
        abort_unless(Auth::check() && Auth::user()->is_admin, 403);
    }
}
