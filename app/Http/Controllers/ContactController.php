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
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        Mail::raw(
            "Nieuw contactbericht:\n\nNaam: {$data['name']}\nE-mail: {$data['email']}\n\nBericht:\n{$data['message']}",
            function ($m) {
                $m->to('admin@ehb.be')->subject('Nieuw contactbericht');
            }
        );

        return back()->with('success', 'Bedankt! Je bericht werd verzonden.');
    }
}
