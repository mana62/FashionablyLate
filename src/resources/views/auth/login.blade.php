@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('button')
    <div class="button-register">
        <button class="button-register__submit" type="submit">
            <a class="button-register__submit-link" href="{{ route('register') }}">Register</a>
        </button>
    </div>
@endsection

@section('content')
    <div class="login-container">
        <div class="login-ttl">
            <h2>Login</h2>
        </div>

        <div class="login-table">
            <form class="login-table__form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="login-table__container">
                    <table class="login-table__inner">
                        </tr>
                        <tr class="login-table__row">
                            <th class="login-table__header">メールアドレス</th>
                            @error('email')
                                <td class="login-table__error">
                                    <div class="login__error">{{ $message }}</div>
                                </td>
                            @enderror
                        </tr>
                        <tr class="login-table__row">
                            <td class="login-table__item">
                                <input class="login-table__item-input" type="email" name="email"
                                    placeholder="例 : test@example.com" value="{{ old('email') }}" />
                            </td>
                        </tr>
                        <tr class="login-table__row">
                            <th class="login-table__header">パスワード</th>
                            @error('password')
                                <td class="login-table__error">
                                    <div class="login__error">{{ $message }}</div>
                                </td>
                            @enderror
                        </tr>
                        <tr class="login-table__row">
                            <td class="login-table__item">
                                <input class="login-table__item-input" type="password" name="password"
                                    placeholder="例 : coachtech1106" />
                            </td>
                        </tr>
                    </table>
                    <div class="login-table__button">
                        <button class="login-table__button-submit" type="submit">ログイン</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
