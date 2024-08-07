@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
    <div class="button-login">
        <a class="button-login__submit-link" href="{{ route('auth.login') }}">
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
                    <form class="search-form" action="{{ route('admin') }}" method="post">
                        @csrf
                        <li class="search-content__item">
                            <div class="search-content__item--name">
                                <input class="search-content__item-input" type="text" name="input"
                                    placeholder="名前またはメールアドレスを入力してください" value="{{ $input ?? '' }}">
                            </div>
                        </li>
                        <li class="search-content__item">
                            <div class="custom-button-select">
                                <select class="search-content__item-select" name="gender">
                                    <option class="search-content__item-option" value="" disabled selected>性別</option>
                                    <option class="search-content__item-option" value="男性">男性</option>
                                    <option class="search-content__item-option" value="女性">女性</option>
                                    <option class="search-content__item-option" value="その他">その他</option>
                                </select>
                            </div>
                        </li>
                        <li class="search-content__item">
                            <div class="custom-button-select">
                                <div class="search-content--category">
                                    <select class="search-content__item-select" name="category">
                                        <option class="search-content__item-option" value="" disabled selected>
                                            お問い合せの種類</option>
                                        <option class="search-content__item-option" value="商品のお届けについて">商品のお届けについて</option>
                                        <option class="search-content__item-option" value="商品の交換について">商品の交換について</option>
                                        <option class="search-content__item-option" value="商品トラブル">商品トラブル</option>
                                        <option class="search-content__item-option" value="ショップへのお問い合わせ">ショップへのお問い合わせ
                                        </option>
                                        <option class="search-content__item-option" value="その他">その他</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        {{-- 日付表示 --}}
                        <li class="search-content__item">
                            <div class="custom-button-input">
                                <input class="search-content__item-input" type="date" id="dateInput">
                                <button class="custom-calendar__button" onclick="openCalendar()">▼</button>
                            </div>
                            <script>
                                function openCalendar() {
                                    const dateInput = document.getElementById('dateInput'); //JavaScriptのコードで、HTMLの要素を取得するためのコード
                                    dateInput.showPicker(); //カレンダーを表示
                                }
                            </script>
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
            {{-- エクスポート --}}
            <div class="export">
                <a class="export-button" href="{{ route('admin.contacts.export') }}">エクスポート</a>
            </div>
            {{-- ページネーション --}}
            <div class="pagination">
                {{ $contacts->links('vendor.pagination.tailwind') }}
            </div>
        </div>

        @if ($contacts->isNotEmpty())
            <div class="table">
                <table class="table-content">
                    <tr class="table-content__items">
                        <th class="table-content__items-header">お名前</th>
                        <th class="table-content__items-header">性別</th>
                        <th class="table-content__items-header">メールアドレス</th>
                        <th class="table-content__items-header">お問合せの種類</th>
                        <th class="table-content__items-header"></th>
                    </tr>

                    @foreach ($contacts as $contact)
                        @php
                            $modalId = 'myModal' . $loop->index;
                        @endphp
                        <tr class="table-content__items">
                            <td class="table-content__items-content">
                                {{ $contact['last_name'] }}{{ $contact['first_name'] }}
                            </td>
                            <td class="table-content__items-content">{{ $contact['gender'] }}</td>
                            <td class="table-content__items-content">{{ $contact['email'] }}</td>
                            <td class="table-content__items-content">{{ $contact['category'] }}</td>
                            <td class="table-button">
                                {{-- モーダルウィンドウ --}}
                                <button type="button" class="table-button__modal" data-toggle="modal"
                                    data-target="#{{ $modalId }}">詳細</button>
                                <div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog"
                                    aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
                                    <div class="modal-document" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-header-ttl">詳細</h2>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                名前：{{ $contact['last_name'] }}{{ $contact['first_name'] }}<br>
                                                性別：{{ $contact['gender'] }}<br>
                                                メールアドレス：{{ $contact['email'] }}<br>
                                                お電話番号：{{ $contact['tell'] }}<br>
                                                住所：{{ $contact['address'] }}<br>
                                                建物名：{{ $contact['building'] }}<br>
                                                お問い合せの種類：{{ $contact['category'] }}<br>
                                                お問い合わせ内容：{{ $contact['detail'] }}
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('admin.contacts.delete', $contact['id']) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button-delete">削除</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
