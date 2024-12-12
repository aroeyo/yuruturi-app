@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - アルバム詳細')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/albumaction.css') }}">
@endsection

@section('contents')

<div class="albumdetail">
    <div class="detailimagewrapper">
        <img src="{{asset('images/test1.jpg')}}">
    </div>

    <div class="detailinfo">
        <span class="label">魚種</span>
        <span class="value">アジ</span>
    </div>

    <div class="detailinfo">
        <span class="label">大きさ</span>
        <span class="value">87cm</span>
    </div>

    <div class="detailinfo">
        <span class="label">釣れた時間</span>
        <span class="value">2024年12月9日 5時24分</span>
    </div>

    <div class="detailinfo">
        <span class="label">ルアーの種類</span>
        <span class="value">アジ</span>
    </div>

    <div class="detailinfo">
        <span class="label">場所</span>
        <span class="value">千葉</span>
    </div>

    <div class="detailinfo">
        <span class="label">魚種</span>
        <span class="value">アジ</span>
    </div>

    <div class="detailinfo">
        <span class="label">魚種</span>
        <span class="value">アジ</span>
    </div>

    <div class="detailnotes">
        <span class="label">備考</span>
        <span class="notes">つい最近採れた中で一番大きいやつですkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk
        </span>
    </div>

    <div class="btnarea">
        <button type="submit" class="submitbtn">確認</button>
    </div>
</div>


@endsection