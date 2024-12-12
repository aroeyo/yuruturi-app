@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - アルバム編集')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/albumaction.css') }}">
@endsection

@section('contents')

<div class="albumdetail">
    <div class="detailimagewrapper">
        <img src="{{asset('images/test1.jpg')}}">
    </div>

<form action="" method="POST">
    <div class="detailinfo">
        <label for="species" class="label">魚種：</label>
        <input type="text" id="species" name="species" class="detailform">
    </div>

    <div class="detailinfo">
        <label for="size" class="label">大きさ：</label>
       <input type="text" id="size" name="size" class="detailform">
    </div>

    <div class="detailinfo">
        <label for="catchtime" class="label">釣れた時間：</label>
        <input type="text" id="catchtime" name="catchtime" class="detailform">
    </div>

    <div class="detailinfo">
        <label for="lure" class="label">ルアーの種類：</label>
        <input type="text" id="lure" name="lure" class="detailform">
    </div>

    <div class="detailinfo">
        <label for="location" class="label">場所：</label>
        <input type="text" id="location" name="location" class="detailform">
    </div>

    <div class="detailnotes">
        <label for="notes" class="label">備考：</label>
        <div class="field">
            <textarea id="notes" name="notes"></textarea>
        </div>
    </div>

    <div class="btnarea">
        <button type="submit" class="submitbtn">更新</button>
        <button type="buttun" class="backbtn" onclick="window.location.href='{{ url('/album/show/') }}'">戻る</button>
    </div>
</div>


@endsection