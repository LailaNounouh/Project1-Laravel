<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Category;
use App\Models\FaqQuestion;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $faqs = Faq::with('category')
            ->when($request->filled('category'), function ($q) use ($request) {
                $q->where('category_id', $request->category);
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('faq.index', compact('faqs', 'categories'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'question' => ['required', 'string', 'min:5'],
        ]);


        FaqQuestion::create($data);

        return redirect()->route('faq.index')
            ->with('success', 'Je vraag werd verstuurd. We bekijken ze zo snel mogelijk!');
    }
}
