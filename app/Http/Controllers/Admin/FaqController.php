<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('category')->orderBy('id','desc')->paginate(10);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => ['required','string','max:255'],
            'answer'   => ['required','string'],
            'category_id' => ['nullable','exists:categories,id'],
        ]);

        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('success','FAQ aangemaakt.');
    }

    public function edit(Faq $faq)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.faqs.edit', compact('faq','categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question' => ['required','string','max:255'],
            'answer'   => ['required','string'],
            'category_id' => ['nullable','exists:categories,id'],
        ]);

        $faq->update($data);

        return redirect()->route('admin.faqs.index')->with('success','FAQ bijgewerkt.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success','FAQ verwijderd.');
    }
}
