<?php

namespace App\Http\Controllers;

use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['nullable','string','max:255'],
            'email'    => ['nullable','email','max:255'],
            'question' => ['required','string','max:2000'],
        ]);

        FaqQuestion::create($data);

        return back()->with('success', 'Bedankt! Je vraag is verzonden en wordt bekeken.');
    }
}
