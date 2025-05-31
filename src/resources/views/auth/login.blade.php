@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header_inner">
        FashionablyLate
        <a href="/register" class="register-link">Register</a>
    </div>
</header>

<main>
    <h1 class="content-title">Login</h1>
    <div class="login-form">
        <form class="login-form__content" method="POST" action="/login">
            @csrf
            <div class="login-form__row">
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" placeholder="例: test@example.com" required autofocus>
            </div>
            <div class="login-form__row">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="例: coachtech1106" required>
            </div>
            <div class="login-form__actions">
                <button type="submit">ログイン</button>
            </div>
        </form>
    </div>
</main>
@endsection