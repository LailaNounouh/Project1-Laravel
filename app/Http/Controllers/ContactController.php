<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function create()
    {
        return view('contact.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
        ]);


        Mail::raw($validated['message'], function ($message) use ($validated) {
            $message->to('admin@ehb.be')
                ->subject('Nieuw contactbericht van ' . $validated['name']);
        });

        return redirect()->route('contact.create')->with('success', 'Bericht verzonden!');
    }
}
