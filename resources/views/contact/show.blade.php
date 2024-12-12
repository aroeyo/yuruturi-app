@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - 問い合わせページ')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('contents')

<div class="contact">
<h2>お問い合わせフォーム</h2>

<div class="border">
</div>

<form action="{{ url('contact/confirm') }}" method="post">
    @csrf
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
        <div class="field">
            <input type="text" id="messagetitle" name="messagetitle" required width="300px">
        </div>
    </div>

    <div class="formgroup contactarea">
        <label for="message">お問い合わせ内容：</label>
        <div class="field">
            <textarea id="message" name="message" required></textarea>
        </div>
    </div>
    <div class="btnarea">
        <button type="submit" class="submitbtn">確認</button>
    </div>

</form>

</div>


@endsection


