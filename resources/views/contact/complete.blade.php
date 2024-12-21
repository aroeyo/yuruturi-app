@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - 問い合わせ確認ページ')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('contents')

<div class="contact">
<p class="confirmtext">問い合わせを受け付けました。</p>

<button type="button" class="backbtn btnposition" onclick="window.location.href='{{ url('/contact/show/') }}'">戻る</button>

<div class="space"></div>

</div>


@endsection


