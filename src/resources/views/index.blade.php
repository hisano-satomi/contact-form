@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
            <table class="contact-table">
                <tr class="contact-table__row-name">
                    <th class="contact-table__header"><label for="last-name">お名前<span class="contact-form--red">※</span></label></th>
                    <td class="contact-table__item">
                        <input class="contact-table__input-name" type="text" id="last-name" name="name" placeholder="例: 山田">
                        <input class="contact-table__input-name" type="text" name="first-Name" placeholder="例: 太郎">
                    </td>
                </tr>
                <tr>
                    <th class="contact-table__header">性別<span class="contact-form--red">※</span></th>
                    <td class="contact-table__item">
                        <input type="radio" id="male" name="gender" value="男性" checked>
                        <label class="contact-table__label-gender" for="male">男性</label>
                        <input type="radio" id="female" name="gender" value="女性">
                        <label class="contact-table__label-gender" for="female">女性</label>
                        <input type="radio" id="others" name="gender" value="女性">
                        <label class="contact-table__label-gender" for="others">その他</label>
                    </td>
                </tr>
                <tr>
                    <th class="contact-table__header">
                        <label for="email">メールアドレス<span class="contact-form--red">※</span></label>
                    </th>
                    <td class="contact-table__item">
                        <input class="contact-table__input" type="email" id="email" name="email" placeholder="例: test@example.com">
                    </td>
                </tr>
                <tr class="contact-table__row-tel">
                    <th class="contact-table__header">
                        <label for="tel1">電話番号<span class="contact-form--red">※</span></label>
                    </th>
                    <td class="contact-table__item">
                        <input class="contact-table__input-tel" type="tel" id="tel1" name="tel1" maxlength="5" placeholder="080">
                        -
                        <input class="contact-table__input-tel" type="tel" id="tel2" name="tel2" maxlength="5" placeholder="1234">
                        -
                        <input class="contact-table__input-tel" type="tel" id="tel3" name="tel3" maxlength="5" placeholder="5678">
                    </td>
                </tr>
                <tr>
                    <th class="contact-table__header">
                        <label for="address">住所<span class="contact-form--red">※</span></label>
                    </th>
                    <td class="contact-table__item">
                        <input class="contact-table__input" type="text" id="address" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                    </td>
                </tr>
                <tr>
                    <th class="contact-table__header">
                        <label for="building">建物名</label>
                    </th>
                    <td class="contact-table__item">
                        <input class="contact-table__input" type="text" id="building" name="building" placeholder="例: 千駄ヶ谷マンション101">
                    </td>
                </tr>
                <tr>
                    <th class="contact-table__header">
                        <label for="category">お問い合わせの種類<span class="contact-form--red">※</span></label>
                    </th>
                    <td class="contact-table__item">
                        <select class="contact-table__select" id="category" name="category">
                            <option value="">選択してください</option>
                        </select>
                    </td>
                </tr>
                <tr class="contact-table__row-content">
                    <th class="contact-table__header">
                        <label for="content">お問い合わせ内容<span class="contact-form--red">※</span></label>
                    </th>
                    <td class="contact-table__item">
                        <textarea class="contact-table__textarea" id="content" name="content" rows="5" placeholder="お問い合わせ内容をご記載ください"></textarea>
                    </td>
                </tr>
            </table>
            <div class="contact-button">
                <button class="contact-button__submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
</main>
@endsection