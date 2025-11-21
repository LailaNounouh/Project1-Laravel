<?php

namespace App\Http\Controllers;

use App\Models\Contact;
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
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email'],
            'message' => ['required', 'string', 'min:10'],
        ]);


        Contact::create($data);


        $body = "Nieuw bericht via GlamConnect contactformulier:\n\n"
            . "Naam: {$data['name']}\n"
            . "E-mail: {$data['email']}\n\n"
            . "Bericht:\n{$data['message']}\n";

        Mail::raw($body, function ($message) {
            $message->to('admin@ehb.be')
                ->subject('Nieuw GlamConnect contactbericht');
        });


        return back()->with('success', 'Bedankt voor je bericht! We hebben het goed ontvangen. 💌');
    }
}
