<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MyRegisterRequest;
use App\Http\Requests\MyLoginRequest;
use Illuminate\Support\Facades\Hash;

class MyRegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(MyRegisterRequest $request)
    {
        $user = $this->create($request->validated()); //バリデーションを通過したデータのみ取得
        return redirect()->route('auth.login');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function show()
    {
        return view('auth.login');
    }

    public function login(MyLoginRequest $request)
    {
        $certifications = $request->only('email', 'password');
        if (Auth::attempt($certifications)) {
            return redirect()->route('admin');
        }
        return back()->withErrors(['login' => 'メールアドレスまたはパスワードが違います'])->withInput(); //認証失敗時
    }
}

//withErrors(): 認証失敗時にカスタムエラーメッセージを設定
//withInput(): フォームの再送信時に、ユーザーが入力したデータを保持
//Auth::attempt() は、提供された認証情報（メールアドレスとパスワード）が正しいかどうかを確認し、ユーザーをログインさせる



