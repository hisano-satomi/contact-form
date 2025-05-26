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
        <form  action="" method="POST">
        @csrf
            <table class="confirm-table">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td>{{ old('name') }} {{ old('first-Name') }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td>{{ old('gender') }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td>{{ old('email') }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td>{{ old('tel') }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td>{{ old('address') }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td>{{ old('building') }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td>{{ old('category') }}</td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td>{{ old('content') }}</td>
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