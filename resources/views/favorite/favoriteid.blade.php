@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - お気に入りアルバム詳細')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/albumaction.css') }}">
@endsection

@section('contents')

<div class="albumdetail">
    <div class="detailimagewrapper">
        <img src="{{asset('storage/' . $favorite->albumImage->image_file) }}">
    </div>

    <div class="detailinfo">
        <span class="label">魚種</span>
        <span class="value">{{ $favorite->albumImage->species->name }}</span>
    </div>

    <div class="detailinfo">
        <span class="label">大きさ</span>
        <span class="value">{{ $favorite->albumImage->size }}</span>
    </div>

    <div class="detailinfo">
        <span class="label">釣れた時間</span>
        <span class="value">{{ $favorite->albumImage->catchtime }}</span>
    </div>

    <div class="detailinfo">
        <span class="label">ルアーの種類</span>
        <span class="value">{{ $favorite->albumImage->lure->name }}</span>
    </div>

    <div class="detailinfo">
        <span class="label">ルアーのサイズ</span>
        <span class="value">{{ $favorite->albumImage->lure->luresize }}</span>
    </div>

    <div class="detailinfo">
        <span class="label">場所</span>
        <span class="value">{{ $favorite->albumImage->location->name }}</span>
    </div>

    <div class="detailnotes">
        <span class="label">備考</span>
        <span class="notes">{{ $favorite->albumImage->notes }}
        </span>
    </div>
</div>


@endsection