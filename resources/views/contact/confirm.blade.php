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

<form action="" method="post">

    <div class="formgroup">
        <label for="name">お名前：</label>
        <p class="field">ここにはログイン時の名前を入れる</p>
    </div>

    <div class="formgroup">
        <label for="email">メールアドレス：</label>
        <p class="field">ここにはログイン時のアドレスを入れる</p>
    </div>

    <div class="formgroup">
        <label for="messagetitle">タイトル：</label>
        <p class="field">ここにはタイトル</p>
    </div>

    <div class="formgroup">
         <label for="message">お問い合わせ内容：</label>
        <p class="field text-area">ここには問い合わせ内容が入る</p>
    </div>

    <div class="btnarea">
        <button type="submit" class="submitbtn">送信</button>
        <button type="buttun" class="backbtn" onclick="window.location.href='{{ url('/contact/show/') }}'">戻る</button>
    </div>

</form>

</div>


@endsection


