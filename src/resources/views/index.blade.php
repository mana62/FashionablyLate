@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index') }}">
@endsection

@section('button')
<div class="button-login">
    <button class="button-login__submit" type="submit">login</button>
</div>
@endsection

@section('content')
<div class="container">
    <div class="register-ttl">
        <h2>Register</h2>
    </div>

    <div class="register-table">
        <table class="register-table__inner">
            <form class="register-table__form" action="">
                <tr class="register-table__row">
                    <th class="register-table__header">お名前</th>
                </tr>
                <tr class="register-table__row">
                    <td class="register-tabl__item">変数入れる（名前）</td>
                </tr>
                <tr class="register-table__row">
                    <th class="register-table__header">メールアドレス</th>
                </tr>
                <tr class="register-table__row">
                    <td class="register-tabl__item">変数入れる（メアド）</td>
                </tr>
                <tr class="register-table__row">
                    <th class="register-table__header">パスワード</th>
                </tr>
                <tr class="register-table__row">
                    <td class="register-tabl__item">変数入れる（pwd）</td>
                </tr>
            </form>

            <div class="register-tabl__button">
                <button class="register-tabl__button-submit" type="submit">登録</button>
            </div>
        </table>
    </div>
</div>
@endsection