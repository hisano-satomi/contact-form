@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header_inner">FashionablyLate</div>
</header>

<main>
    <h1 class="content-title">Admin</h1>
    
    <div class="admin-content">
        <div class="search-form">
            <form action="" method="GET">
                @csrf
                <div class="search-form__item">
                    <input type="text" name="name" value="{{ request('name') }}" placeholder="名前やメールアドレスを入力してください">
                </div>
                <div class="search-form__item">
                    <select name="gender">
                        <option value="" {{ request()->has('gender') ? '' : 'selected' }}>性別</option>
                        <option value="">全て</option>
                        <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                        <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                        <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                    </select>
                </div>
                <div class="search-form__item">
                    <select name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="search-form__item">
                    <input type="date" name="from" value="{{ request('from') }}">
                </div>
                <div class="search-form__actions">
                    <button type="submit">検索</button>
                </div>
            </form>
            <div class="contact-list">
                <div class="contact-export"></div>
                <div class="contact-nav"></div>
                <table class="contact-table">
                    <thead>
                        <tr>
                            <th>お名前</th>
                            <th>性別</th>
                            <th>メールアドレス</th>
                            <th>お問い合わせの種類</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                                <td>
                                    @if($contact->gender == 1)
                                        男性
                                    @elseif($contact->gender == 2)
                                        女性
                                    @elseif($contact->gender == 3)
                                        その他
                                    @endif
                                </td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->category->content ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</main>
@endsection