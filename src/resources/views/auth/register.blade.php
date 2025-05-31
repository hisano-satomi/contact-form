@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header_inner">
        FashionablyLate
        <a href="/login" class="login-link">login</a>
    </div>
</header>

<main>
    <h1 class="content-title">Register</h1>
    <div class="register-form">
        <form class="register-form__content" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="register-form__row">
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="例: 山田　太郎" required autofocus>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="register-form__row">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="register-form__row">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="例: coachtech1106" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="register-form__actions">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</main>
@endsection