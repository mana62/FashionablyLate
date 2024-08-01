<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\Hash;

class MyRegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(AuthorRequest $request)
    {
        $user = $this->create($request->all());
        return redirect()->route('login');
    }

    public function create(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
}
}
