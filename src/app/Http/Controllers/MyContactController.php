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
        $request->session()->put('contact', $contact); // セッションにデータを保存
        return view('confirm', compact('contact'));
    }

    public function showConfirm(Request $request)
    {
        // セッションからデータを取得
        $contact = $request->session()->get('contact');

        // 確認画面を表示
        return view('thanks', ['contact' => $contact]);
    }

    public function store(MyContactRequest $request)
    {
        $contact = $request->session()->get('contact'); // セッションからデータを取得
        Contact::create($contact); // データベースに保存
        return redirect()->route('thanks'); // Thanksページにリダイレクト
    }

    public function show()
    {
        return view('thanks');
    }
}
