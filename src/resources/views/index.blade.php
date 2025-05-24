@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('index.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header_inner">FashionablyLate</div>
</header>

<main>
    <h1 class="content-title">Contact</h1>

    <div class="content">
        <form class="contact-form" action="" method="POST">
        @csrf
            <table>
                <tr>
                    <th><label for="last-name">お名前<span class="contact-form--red">※</span></label></th>
                    <td>
                        <input type="text" id="last-name" name="name">
                        <input type="text" name="first-Name">
                    </td>
                </tr>
                <tr>
                    <th>性別<span class="contact-form--red">※</span></th>
                    <td>
                        <input type="radio" id="male" name="gender" value="男性"><label for="male">男性</label>
                        <input type="radio" id="female" name="gender" value="女性"><label for="female">女性</label>
                        <input type="radio" id="others" name="gender" value="女性"><label for="others">その他</label>
                    </td>
                </tr>
                <tr>
                    <th><label for="email">メールアドレス<span class="contact-form--red">※</span></label></th>
                    <td><input type="email" id="email" name="email"></td>
                </tr>
                <tr>
                    <th><label for="tel">電話番号<span class="contact-form--red">※</span></label></th>
                    <td><input type="tel" id="tel" name="tel"></td>
                </tr>
                <tr>
                    <th><label for="address">住所<span class="contact-form--red">※</span></label></th>
                    <td><input type="text" id="address" name="address"></td>
                </tr>
                <tr>
                    <th><label for="building">建物名</label></th>
                    <td><input type="text" id="building" name="building"></td>
                </tr>
                <tr>
                    <th><label for="category">お問い合わせの種類<span class="contact-form--red">※</span></label></th>
                    <td>
                        <select id="category" name="category">
                            <option value="">選択してください</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="content">お問い合わせ内容<span class="contact-form--red">※</span></label></th>
                    <td><textarea id="content" name="content" rows="5"></textarea></td>
                </tr>
            </table>
            <button type="submit">確認画面</button>
        </form>
    </div>
</main>
@endsection