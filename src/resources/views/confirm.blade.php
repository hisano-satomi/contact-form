@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header_inner">FashionablyLate</div>
</header>

<main>
    <h1 class="content-title">Confirm</h1>

    <div class="content">
        <form  action="store" method="POST">
        @csrf
            <table class="confirm-table">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td>{{ $contact['gender'] }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td>{{ $contact['email'] }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td>{{ $contact['tel1'] }}-{{ $contact['tel2'] }}-{{ $contact['tel3'] }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td>{{ $contact['address'] }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td>{{ $contact['building'] }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td>{{ $category['content'] }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td>{{ $contact['detail'] }}</td>
                </tr>
            </table>
            <div class="confirm-button">
                <button class="confirm-button__submit" type="submit">送信</button>
                <button class="confirm-button__fix" type="button" onclick="history.back();">修正</button>
            </div>
        </form>
    </div>
</main>
@endsection