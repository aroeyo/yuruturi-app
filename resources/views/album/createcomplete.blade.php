@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - アップロード完了')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/albumaction.css') }}">
@endsection

@section('contents')

<div class="contact">
    <p class="completetext">アップロードが完了しました。</p>

    <button type="button" class="backbtn btnposition" onclick="window.location.href='{{ url('/contact/show/') }}'">戻る</button>
    
    <div class="space"></div>
    
</div>

@endsection