<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('faq.index', compact('faqs'));
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
