@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('button')
    <div class="button-login">
        <button class="button-login__submit" type="submit">
            <a class="button-login__submit-link" href="{{ route('login') }}">Login</a>
        </button>
    </div>
@endsection

@section('content')
    <div class="register-container">
        <div class="register-ttl">
            <h2>Register</h2>
        </div>

        <div class="register-table">
            <form class="register-table__form" action="{{ route('register') }}" method="post">
                @csrf
                <div class="register-table__container">
                    <table class="register-table__inner">
                        <tr class="register-table__row">
                            <th class="register-table__header">お名前</th>
                            @error('name')
                            <td class="register-table__error">
                                <div class="register__error">{{ $message }}</div>
                    </td>
                    @enderror
                        </tr>
                        <tr class="register-table__row">
                            <td class="register-table__item">
                                <input class="register-table__item-input" type="text" name="name"
                                    placeholder="例 : 山田 太郎" value="{{ old('name') }}" />
                            </td>
                        </tr>
                        <tr class="register-table__row">
                            <th class="register-table__header">メールアドレス</th>
                            <td class="register-table__error">
                                @error('email')
                                    <span class="register__error">{{ $message }}</span>
                            </td>
                            @enderror
                        </tr>
                        <tr class="register-table__row">
                            <td class="register-table__item">
                                <input class="register-table__item-input" type="email" name="email"
                                    placeholder="例 : test@example.com" value="{{ old('email') }}" />
                            </td>
                        </tr>
                        <tr class="register-table__row">
                            <th class="register-table__header">パスワード</th>
                            <td class="register-table__error">
                                @error('password')
                                    <span class="register__error">{{ $message }}</span>
                            </td>
                            @enderror
                        </tr>
                        <tr class="register-table__row">
                            <td class="register-table__item">
                                <input class="register-table__item-input" type="password" name="password"
                                    placeholder="例 : coachtech1106" />
                            </td>
                        </tr>
                        <tr class="register-table__row">
                            <th class="register-table__header">パスワード確認</th>
                            <td class="register-table__error">
                                @error('password')
                                    <span class="register__error">{{ $message }}</span>
                            </td>
                            @enderror
                        </tr>
                        <tr class="register-table__row">
                            <td class="register-table__item">
                                <input class="register-table__item-input" type="password" name="password_confirmation" placeholder="例 : coachtech1106" />
                            </td>
                        </tr>
                    </table>
                    <div class="register-table__button">
                        <button class="register-table__button-submit" type="submit">登録</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
