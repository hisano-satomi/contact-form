@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<header class="header">
    <div class="header__content">
        <div class="header__logo">FashionablyLate</div>
        <div class="header__nav">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout-btn">ログアウト</button>
            </form>
        </div>
    </div>
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
                    <a href="" class="reset-btn">リセット</a>
                </div>
            </form>
            <div class="contact-list">
                <div class="contact-export">
                    <a href="{{ route('admin.export') }}" class="export-btn">エクスポート</a>
                </div>
                
                @if($contacts->count())
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
                                    <td>
                                        <button type="button" 
                                                class="detail-btn" 
                                                data-name="{{ $contact->last_name }} {{ $contact->first_name }}"
                                                data-gender="{{ $contact->gender }}"
                                                data-email="{{ $contact->email }}"
                                                data-category="{{ $contact->category->content ?? '' }}"
                                                data-detail="{{ $contact->detail }}"
                                                onclick="showModal(this)">
                                            詳細
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper">
                        {{ $contacts->appends(request()->query())->links() }}
                    </div>
                @else
                    <p>データがありません。</p>
                @endif
            </div>
        </div>
    </div>
</main>

<!-- 詳細モーダル -->
<div id="detailModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>お問い合わせ詳細</h2>
        <table>
            <tr>
                <th>お名前</th>
                <td id="modalName"></td>
            </tr>
            <tr>
                <th>性別</th>
                <td id="modalGender"></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td id="modalEmail"></td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td id="modalCategory"></td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td id="modalDetail"></td>
            </tr>
        </table>
    </div>
</div>

@endsection

@section('js')
<script>
    function showModal(button) {
        const modal = document.getElementById('detailModal');
        const gender = {
            '1': '男性',
            '2': '女性',
            '3': 'その他'
        };

        // モーダルにデータを設定
        document.getElementById('modalName').textContent = button.dataset.name;
        document.getElementById('modalGender').textContent = gender[button.dataset.gender] || '';
        document.getElementById('modalEmail').textContent = button.dataset.email;
        document.getElementById('modalCategory').textContent = button.dataset.category;
        document.getElementById('modalDetail').textContent = button.dataset.detail;

        modal.style.display = 'block';
    }

    function closeModal() {
        const modal = document.getElementById('detailModal');
        modal.style.display = 'none';
    }

    // モーダルの外側をクリックしたら閉じる
    window.onclick = function(event) {
        const modal = document.getElementById('detailModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>
@endsection