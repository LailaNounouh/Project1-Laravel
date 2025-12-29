<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMessageMail;
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
            'message' => ['required', 'string'],
        ]);


        $contact = Contact::create($data);


        Mail::to('admin@ehb.be')->send(
            new ContactMessageMail($contact)
        );


        return back()->with(
            'success',
            'Bedankt voor je bericht! We hebben het goed ontvangen. 💌'
        );
    }
}
