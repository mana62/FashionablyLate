@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact-container">
        <div class="contact-ttl">
            <h2>contact</h2>
        </div>

        <div class="container">
            <form class="form" name="contact" method="post">
                <div class="form__items">
                    <p class="form__item">お名前 ※</p>
                    <input class="form__item-input" type="text" name="firstname" placeholder="例 山田">
                    <input class="form__item-input" type="text" name="lastname" placeholder="例 太郎">
                </div>
                <div class="form__items">
                    <p class="form__item">性別 ※</p>
                    <input class="form__item-input" type="radio" name="gender" value="男性">
                    <span class="form__item-span">男性</span>
                    <input class="form__item-input" type="radio" name="gender" value="女性">
                    <span class="form__item-span">女性</span>
                    <input class="form__item-input" type="radio" name="gender" value="その他">
                    <span class="form__item-span">その他</span>
                </div>
                <div class="form__items">
                    <p class="form__item">メールアドレス ※</p>
                    <input class="form__item-input" type="text" name="emain" placeholder="例 test@example.com">
                </div>
                <div class="form__items">
                    <p class="form__item">電話番号 ※</p>
                    <input class="form__item-input" type="text" name="tell" placeholder="例 080"><span> - </span>
                    <input class="form__item-input" type="text" name="tell" placeholder="例 1234"><span> - </span>
                    <input class="form__item-input" type="text" name="tell" placeholder="例 5678"><span>
                </div>
                <div class="form__items">
                    <p class="form__item">住所 ※</p>
                    <input class="form__item-input" type="text" name="adress" placeholder="例 東京都世田谷区千駄ヶ谷1-2-3">
                </div>
                <div class="form__items">
                    <p class="form__item">建物名</p>
                    <input class="form__item-input" type="text" name="building" placeholder="例 千駄ヶ谷マンション101">
                </div>
                <div class="form__items">
                    <p class="form__item">お問い合わせ種類</p>
                    <select class="form__item-select" name="category">
                        <option class="form__item-select-option" value="">お問合せの種類</option>
                        <option class="form__item-select-option" value="">商品のお届けについて</option>
                        <option class="form__item-select-option" value="">商品の交換について</option>
                        <option class="form__item-select-option" value="">商品トラブル</option>
                        <option class="form__item-select-option" value="">ショップへのお問い合わせ</option>
                        <option class="form__item-select-option" value="">その他</option>
                    </select>
                </div>
                <div class="form__items">
                    <p class="form__item">お問い合わせ内容 ※</p>
                    <textarea name="textarea" class="form-item-textarea" placeholder="お問い合わせの内容を記載してください"></textarea>
                </div>
                <div class="form__items">
                    <button class="form__item-submit" type="submit">確認画面</button>
                </div>
        </div>
    </div>
    @endsection