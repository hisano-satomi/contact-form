@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks-bg-text">Thank you</div>
<div class="thanks-content">
    <div class="thanks-content__text">
        お問い合わせありがとうございました
    </div>
    <div class="thanks-content__button">
        <a class="thanks-content__link" href="/">HOME</a>
    </div>
</div>
@endsection