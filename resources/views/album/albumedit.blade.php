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
        <input type="text" id="species" name="species" class="detailform" list="species-list">
        <datalist id="species-list">
            <option value="ヒラメ"></option>
            <option value="シーバス"></option>
            <option value="イナダ"></option>
            <option value="ワラサ"></option>
            <option value="ショゴ"></option>
            <option value="カンパチ"></option>
            <option value="マゴチ"></option>
        </datalist>
    </div>

    <div class="detailinfo">
        <label for="size" class="label">大きさ：</label>
       <input type="text" id="size" name="size" class="detailform">
    </div>

    <div class="detailinfo">
        <label for="catchtime" class="label">釣れた時間：</label>
        <input type="datetime-local" id="catchtime" name="catchtime" class="detailform">
    </div>

    <div class="detailinfo">
        <label for="lure" class="label">ルアーの種類：</label>
        <input type="text" id="lure" name="lure" class="detailform">
        <select id="lureweight" name="lureweight" style="margin-top:5px; width:15%;">
            <option value="10">10g</option>g
            <option value="15">15g</option>g
            <option value="20">20g</option>g
            <option value="25">25g</option>g
            <option value="30">30g</option>g
            <option value="35">35g</option>g
            <option value="40">40g</option>g
            <option value="45">45g</option>g
            <option value="50">50g</option>g
        </select>
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
        <button type="submit" class="submitbtn">登録</button>
        <button type="buttun" class="backbtn" onclick="window.location.href='{{ url('/album/show/') }}'">戻る</button>
    </div>
</div>


@endsection