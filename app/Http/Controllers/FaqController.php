<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $categories = \App\Models\Category::orderBy('name')->get();

        $faqs = \App\Models\Faq::with('category')
            ->when($request->filled('category'), function ($q) use ($request) {
                $q->where('category_id', $request->category);
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('faq.index', compact('faqs', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:500',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => 'Bedankt voor je vraag! Ons team zal deze binnenkort beantwoorden.',
            'category_id' => 1, // 'Algemeen'
        ]);

        return redirect()->route('faq.index')->with('success', 'Je vraag is verzonden!');
    }
}
