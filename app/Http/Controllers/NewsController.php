<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $newsQuery = News::query()->latest();

        if ($query) {
            $newsQuery->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('content', 'like', '%' . $query . '%');
            });
        }

        $news = $newsQuery->paginate(10)->withQueryString();

        return view('news.index', compact('news', 'query'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $data = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $data['user_id'] = Auth::id();

        News::create($data);

        return redirect()->route('news.index')->with('success', '🎉 Nieuwsbericht aangemaakt!');
    }

    public function edit(News $news)
    {
        $this->authorizeAdmin();
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $this->authorizeAdmin();

        $data = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('news.show', $news)->with('success', '✅ Nieuws bijgewerkt.');
    }

    public function destroy(News $news)
    {
        $this->authorizeAdmin();

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', '🗑️ Nieuws verwijderd.');
    }

    private function authorizeAdmin()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Onvoldoende rechten om deze actie uit te voeren.');
        }
    }
}
