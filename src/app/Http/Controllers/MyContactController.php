<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MyContactRequest;
use App\Models\Contact;
use App\Models\Category;

class MyContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(MyContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
        $request->session()->put('contact', $contact); //session()->putデータ保存
        return view('confirm', compact('contact'));

    }

    public function store(MyContactRequest $request)
    {
        $contact = $request->session()->get('contact'); //session()->getセッションからデータを取得
        Contact::create($contact);
        return redirect()->route('thanks');
    }

    public function show()
    {
        return view('thanks');
    }
}

