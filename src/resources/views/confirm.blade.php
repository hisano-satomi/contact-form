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
        <form  action="/thanks" method="POST">
        @csrf
            <table class="confirm-table">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__item">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                        {{ $contact['last_name'] }}
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        {{ $contact['first_name'] }}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__item">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                        @if ($contact['gender'] == '1')
                            男性
                        @elseif ($contact['gender'] == '2')
                            女性
                        @elseif ($contact['gender'] == '3')
                            その他
                        @endif
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__item">
                        <input type="hidden" name="email" value="{{ $contact['email'] }}">
                        {{ $contact['email'] }}
                    </td>    
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__item">
                        <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                        {{ $contact['tel1'] }}
                        <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                        {{ $contact['tel2'] }}
                        <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
                        {{ $contact['tel3'] }}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__item">
                        <input type="hidden" name="address" value="{{ $contact['address'] }}">
                        {{ $contact['address'] }}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__item">
                        <input type="hidden" name="building" value="{{ $contact['building'] }}">
                        {{ $contact['building'] }}
                    </td>    
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__item">
                        <input type="hidden" name="category_id" value="{{ $category['id'] }}">
                        {{ $category['content'] }}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__item">
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                        {{ $contact['detail'] }}
                    </td>    
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