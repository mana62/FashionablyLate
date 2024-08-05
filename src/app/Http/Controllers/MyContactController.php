<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MyContactRequest;
use App\Models\Contact;

class MyContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(MyContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category', 'detail']);
        $request->session()->put('contact', $contact);
        return view('confirm', ['contact' => $contact]);
    }

    public function show()
    {
        return view('thanks');
    }

    public function store(MyContactRequest $request)
    {
        $contact = $request->session()->get('contact');
        Contact::create($contact);
        return redirect()->route('thanks');
    }
}

