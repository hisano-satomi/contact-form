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
        <form action="/confirm" method="POST">
        @csrf
            <table class="contact-table">
                <tr class="contact-table__row-name">
                    <th class="contact-table__header"><label for="last-name">お名前<span class="contact-form--red">※</span></label></th>
                    <td class="contact-table__item">
                        <input class="contact-table__input-name" type="text" id="last-name" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                        <input class="contact-table__input-name" type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                        @error('last_name')<div class="contact-error">{{ $message }}</div>@enderror
                        @error('first_name')<div class="contact-error">{{ $message }}</div>@enderror
                    </td>
                </tr>
                <tr>
                    <th class="contact-table__header">性別<span class="contact-form--red">※</span></th>
                    <td class="contact-table__item">
                        <input type="radio" id="male" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}>
                        <label class="contact-table__label-gender" for="male">男性</label>
                        <input type="radio" id="female" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
                        <label class="contact-table__label-gender" for="female">女性</label>
                        <input type="radio" id="others" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>
                        <label class="contact-table__label-gender" for="others">その他</label>
                        @error('gender')<div class="contact-error">{{ $message }}</div>@enderror
                    </td>
                </tr>
                <tr>
                    <th class="contact-table__header">
                        <label for="email">メールアドレス<span class="contact-form--red">※</span></label>
                    </th>
                    <td class="contact-table__item">
                        <input class="contact-table__input" type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                        @error('email')<div class="contact-error">{{ $message }}</div>@enderror
                    </td>
                </tr>
                <tr class="contact-table__row-tel">
                    <th class="contact-table__header">
                        <label for="tel1">電話番号<span class="contact-form--red">※</span></label>
                    </th>
                    <td class="contact-table__item">
                        <input class="contact-table__input-tel" type="tel" id="tel1" name="tel1" maxlength="5" placeholder="080" value="{{ old('tel1') }}">
                        -
                        <input class="contact-table__input-tel" type="tel" id="tel2" name="tel2" maxlength="5" placeholder="1234" value="{{ old('tel2') }}">
                        -
                        <input class="contact-table__input-tel" type="tel" id="tel3" name="tel3" maxlength="5" placeholder="5678" value="{{ old('tel3') }}">
                        @error('tel1')<div class="contact-error">{{ $message }}</div>@enderror
                    </td>
                </tr>
                <tr>
                    <th class="contact-table__header">
                        <label for="address">住所<span class="contact-form--red">※</span></label>
                    </th>
                    <td class="contact-table__item">
                        <input class="contact-table__input" type="text" id="address" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                        @error('address')<div class="contact-error">{{ $message }}</div>@enderror
                    </td>
                </tr>
                <tr>
                    <th class="contact-table__header">
                        <label for="building">建物名</label>
                    </th>
                    <td class="contact-table__item">
                        <input class="contact-table__input" type="text" id="building" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                    </td>
                </tr>
                <tr>
                    <th class="contact-table__header">
                        <label for="category">お問い合わせの種類<span class="contact-form--red">※</span></label>
                    </th>
                    <td class="contact-table__item">
                        <select class="contact-table__select" id="category" name="category_id">
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="contact-error">{{ $message }}</div>@enderror
                    </td>
                </tr>
                <tr class="contact-table__row-content">
                    <th class="contact-table__header">
                        <label for="content">お問い合わせ内容<span class="contact-form--red">※</span></label>
                    </th>
                    <td class="contact-table__item">
                        <textarea class="contact-table__textarea" id="content" name="detail" rows="5" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                        @error('detail')<div class="contact-error">{{ $message }}</div>@enderror
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