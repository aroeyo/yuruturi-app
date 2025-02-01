@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - 問い合わせ確認ページ')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('contents')

<div class="contact">
<p class="confirmtext">以下の内容で送信します</p>

<div class="border">
</div>

<form action="{{ route('contact.complete') }}" method="post">
    @csrf

    <div class="formgroup">
        <label for="name">お名前：</label>
        <p class="field">{{ session('contactform.name')}}</p>
    </div>

    <div class="formgroup">
        <label for="email">メールアドレス：</label>
        <p class="field">{{ session('contactform.email')}}</p>
    </div>

    <div class="formgroup">
        <label for="messagetitle">タイトル：</label>
        <p class="field">{{ session('contactform.messagetitle')}}</p>
    </div>

    <div class="formgroup">
         <label for="message">お問い合わせ内容：</label>
        <p class="field text-area">{{ session('contactform.message')}}</p>
    </div>

    <div class="btnarea">
        <button type="submit" class="submitbtn">送信</button>
        <button type="button" class="backbtn" onclick="window.location.href='{{ url('/contact/show/') }}'">修正する</button>
    </div>

</form>

<div class="space"></div>

</div>


@endsection


