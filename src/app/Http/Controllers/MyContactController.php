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
        $contact = $request->all();

        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category ? $category->content : 'カテゴリが見つかりません';

        $request->session()->put('contact', $contact); //セッションにデータを保存
        return view('confirm', compact('contact'));
    }

    public function showConfirm(Request $request)
    {
        //セッションからデータを取得
        $contact = $request->session()->get('contact');

        //確認画面を表示
        return view('thanks', ['contact' => $contact]);
    }

    public function store(MyContactRequest $request)
    {
        $contact = $request->session()->get('contact');
        Contact::create([
            'category_id' => $contact['category_id'],
            'first_name' => $contact['first_name'],
            'last_name' => $contact['last_name'],
            'gender' => $contact['gender'],
            'email' => $contact['email'],
            'tell' => $contact['tell'],
            'address' => $contact['address'],
            'building' => $contact['building'],
            'detail' => $contact['detail'],

        ]);
        return redirect()->route('thanks');
    }

    public function show()
    {
        return view('thanks');
    }
}
