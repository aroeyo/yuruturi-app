@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - アップロード完了')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/albumaction.css') }}">
@endsection

@section('contents')

<div class="contact">
<p class="confirmtext">アップロードが完了しました。</p>

<buttun type="buttun" class="backbtn btnposition" onclick="window.location.href='{{ url('/contact/show/') }}'">戻る</buttun>

<div class="space"></div>


@endsection