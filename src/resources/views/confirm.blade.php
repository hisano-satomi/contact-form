@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('confirm.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header_inner">FashionablyLate</div>
</header>

<main>
    <h1 class="content-title">Confirm</h1>

    <div class="content">
        <form class="confirm" action="" method="POST">
        @csrf
            <table>
                <tr>
                    <th>お名前</th>
                    <td>{{ old('name') }} {{ old('first-Name') }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>{{ old('gender') }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ old('email') }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ old('tel') }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ old('address') }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ old('building') }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ old('category') }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ old('content') }}</td>
                </tr>
            </table>
            <button type="submit">送信</button>
            <button type="button" onclick="history.back();">修正する</button>
        </form>
    </div>
</main>
@endsection