@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact-container">
        <div class="contact-ttl">
            <h2>Contact</h2>
        </div>

        <div class="container">
            <form class="form" action="{{ route('confirm') }}" method="post">
                @csrf
                <div class="form__items">
                    <p class="form__item">お名前 <span class="required">※</span></p>
                    @error('last_name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                    <input class="form__item-input" type="text" name="last_name" placeholder="例 山田"
                        value="{{ old('last_name', session('contact.last_name', '')) }}">
                    @error('first_name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                    <input class="form__item-input" type="text" name="first_name" placeholder="例  太郎"
                        value="{{ old('first_name', session('contact.first_name', '')) }}">
                </div>

                <div class="form__items">
                    <p class="form__item">性別 <span class="required">※</span></p>
                    @error('gender')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                    <input class="form__item-input--radio" type="radio" name="gender" value="男性"
                        {{ old('gender') == '男性' ? 'checked' : ($errors->has('gender') ? '' : 'checked') }} />
                    <span class="form__item-span">男性</span>
                    <input class="form__item-input--radio" type="radio" name="gender" value="女性"
                        {{ old('gender') == '女性' ? 'checked' : '' }} />
                    <span class="form__item-span">女性</span>
                    <input class="form__item-input--radio" type="radio" name="gender" value="その他"
                        {{ old('gender') == 'その他' ? 'checked' : '' }} />
                    <span class="form__item-span">その他</span>
                </div>

                <div class="form__items">
                    <p class="form__item">メールアドレス <span class="required">※</span></p>
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                    <input class="form__item-input" type="text" name="email" placeholder="例  test@example.com"
                        value="{{ old('email', session('contact.email', '')) }}">
                </div>

                <div class="form__items">
                    <p class="form__item">電話番号 <span class="required">※</span></p>
                    @error('tell')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                    <input class="form__item-input" type="text" name="tell" placeholder="例  08012345678"
                        value="{{ old('tell', session('contact.tell', '')) }}">
                </div>

                <div class="form__items">
                    <p class="form__item">住所 <span class="required">※</span></p>
                    @error('address')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                    <input class="form__item-input" type="text" name="address" placeholder="例  東京都世田谷区千駄ヶ谷1-2-3"
                        value="{{ old('address', session('contact.address', '')) }}">
                </div>

                <div class="form__items">
                    <p class="form__item">建物名</p>
                    @error('building')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                    <input class="form__item-input" type="text" name="building" placeholder="例  世田谷マンション101"
                        value="{{ old('building', session('contact.building', '')) }}">
                </div>

                <div class="form__items">
                    <p class="form__item">お問い合わせの種類<span class="required">※</span></p>
                    @error('category_id')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                    <div class="custom-button-select">
                        <select class="form__item-select" name="category_id">
                            <option class="form__item-select-option" value="" disabled selected>選択してください</option>
                            <option class="form__item-select-option" value="商品のお届けについて" 
                                {{ old('category_id', session('contact.category_id', '')) == '商品のお届けについて' ? 'selected' : '' }}>
                                商品のお届けについて
                            </option>
                            <option class="form__item-select-option" value="商品の交換について" 
                                {{ old('category_id', session('contact.category_id', '')) == '商品の交換について' ? 'selected' : '' }}>
                                商品の交換について
                            </option>
                            <option class="form__item-select-option" value="商品トラブル" 
                                {{ old('category_id', session('contact.category_id', '')) == '商品トラブル' ? 'selected' : '' }}>
                                商品トラブル
                            </option>
                            <option class="form__item-select-option" value="ショップへのお問い合わせ" 
                                {{ old('category_id', session('contact.category_id', '')) == 'ショップへのお問い合わせ' ? 'selected' : '' }}>
                                ショップへのお問い合わせ
                            </option>
                            <option class="form__item-select-option" value="その他" 
                                {{ old('category_id', session('contact.category_id', '')) == 'その他' ? 'selected' : '' }}>
                                その他
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form__items">
                    <p class="form__item">お問い合わせ内容 <span class="required">※</span></p>
                    @error('detail')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                    <textarea name="detail" class="form-item-textarea" placeholder="お問い合わせの内容を記載してください">{{ old('detail', session('contact.detail', '')) }}</textarea>
                </div>

                <div class="form-button">
                    <button class="form-button__submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </div>
@endsection
