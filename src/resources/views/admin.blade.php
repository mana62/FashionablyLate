@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
    <div class="button-login">
        <a class="button-login__submit-link" href="{{ route('login') }}">
            <button class="button-login__submit" type="button">Logout
            </button>
        </a>
    </div>
@endsection

@section('content')
    <div class="admin-container">
        <div class="admin-ttl">
            <h2>Admin</h2>
        </div>

        <div class="container">
            <div class="search-container">
                <ul class="search-content">
                    <form class="search-form" action="{{ route('admin') }}" method="get">
                        <li class="search-content__item">
                            <input class="search-content__item-input" type="text" name="query"
                                placeholder="名前またはメールアドレスを入力してください">
                        </li>
                        <li class="search-content__item">
                            <div class="custom-button-select">
                            <select class="search-content__item-select" name="gender">
                                <option class="search__item-select-option" value="" disabled selected>性別</option>
                                <option class="search-content__item-option" value="male">男性</option>
                                <option class="search-content__item-option" value="female">女性</option>
                                <option class="search-content__item-option" value="other">その他</option>
                            </select>
                        </div>
                        </li>
                        <li class="search-content__item">
                            <div class="custom-button-select">
                            <select class="search-content__item-select" name="category">
                                <option class="search-content__item-option" value="" disabled selected>お問い合せの種類</option>
                                <option class="search-content__item-option" value="">商品のお届けについて</option>
                                <option class="search-content__item-option" value="">商品の交換について</option>
                                <option class="search-content__item-option" value="">商品トラブル</option>
                                <option class="search-content__item-option" value="">ショップへのお問い合わせ</option>
                                <option class="search-content__item-option" value="">その他</option>
                            </select>
                        </div>
                        </li>
                        <li class="search-content__item">
                            <div class="custom-button-select">
                            <input class="search-content__item-input" type="date" name="date">
                            </div>
                        </li>
                </ul>
                <div class="search-button">
                    <button class="search-button__submit" type="submit">検索</button>
                </div>
                <div class="search-button">
                    <button class="search-button__reset" type="reset">リセット</button>
                </div>
            </form>
            </div>
            </div>

            <div class="container-row">
                <div class="export">
                    <a href="{{-- route('contacts.export') --}}" class="export-button">エクスポート</a>
                </div>
                <div class="pagination">
                    {{ $contacts->links('vendor.pagination.tailwind') }}
                </div>
            </div>

            <div class="table">
                <table class="table-content">
                    <tr class="table-content__items">
                        <th class="table-content__items-header">お名前</th>
                        <th class="table-content__items-header">性別</th>
                        <th class="table-content__items-header">メールアドレス</th>
                        <th class="table-content__items-header">お問合せの種類</th>
                        <th class="table-content__items-header"></th>
                    </tr>

                    @foreach($contacts as $contact)
                    <tr class="table-content__items">
                        <td class="table-content__items-content">{{ $contact['last_name'] }}{{ $contact['first_name'] }}</td>
                        <td class="table-content__items-content">{{ $contact['gender'] }}</td>
                        <td class="table-content__items-content">{{ $contact['email'] }}</td>
                        <td class="table-content__items-content">{{ $contact['category'] }}</td>
                        <td class="table-link">
                                <a class="table-link__a" href="{{-- route('contacts.show', $contact->id) --}}">詳細</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @endsection