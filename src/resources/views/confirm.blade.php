@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm-container">
        <div class="confirm-ttl">
            <h2>Confirm</h2>
        </div>

        <div class="table">
            <form action="{{ route('thanks') }}" method="post">
                @csrf
            <table class="table-content">
                <tr class="table-content__items">
                    <th class="table-content__items-header">お名前</th>
                    <td class="table-content__items-content">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
                </tr>

                <tr class="table-content__items">
                    <th class="table-content__items-header">性別</th>
                    <td class="table-content__items-content">{{ $contact['gender'] }} </td>
                </tr>
                <tr class="table-content__items">
                    <th class="table-content__items-header">電話番号</th>
                    <td class="table-content__items-content">{{ $contact['tell'] }} </td>
                </tr>
                <tr class="table-content__items">
                    <th class="table-content__items-header">住所</th>
                    <td class="table-content__items-content">{{ $contact['address'] }} </td>
                </tr>
                <tr class="table-content__items">
                    <th class="table-content__items-header">建物名</th>
                    <td class="table-content__items-content">{{ $contact['building'] }} </td>
                </tr>
                <tr class="table-content__items">
                    <th class="table-content__items-header">お問い合わせの種類</th>
                    <td class="table-content__items-content">{{ $contact['category'] }} </td>
                </tr>
                <tr class="table-content__items">
                    <th class="table-content__items-header">お問い合わせ内容</th>
                    <td class="table-content__items-content">{{ $contact['detail'] }} </td>
                </tr>
            </table>
            <div class="confirm-table__button">
                <button class="confirm-table__button-submit" type="submit">送信</button>
                <a class="confirm-link" href="{{ route('index') }}">修正</a>
            </div>
            </form>
        </div>
    </div>
@endsection