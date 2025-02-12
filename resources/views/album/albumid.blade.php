@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - アルバム詳細')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/albumaction.css') }}">
@endsection

@section('contents')

<div class="albumdetail">
    <div class="detailimagewrapper">
        <img src="{{asset('storage/' . $albumImage->image_file) }}">
    </div>

    <div class="detailset">
        <div class="detailinfo">
            <span class="label">釣れた時間</span>
            <span class="value">{{ $albumImage->catchtime }}</span>
        </div>

        <div class="detailinfo">
            <span class="label">場所</span>
            <span class="value">{{ $albumImage->location->name }}</span>
        </div>
    </div>

    <div class="detailset">
        <div class="detailinfo">
            <span class="label">魚種</span>
            <span class="value">{{ $albumImage->species->name }}</span>
        </div>

        <div class="detailinfo">
            <span class="label">大きさ</span>
            <span class="value">{{ $albumImage->size }}</span>
        </div>
    </div>

    <div class="detailset">
        <div class="detailinfo">
            <span class="label">ルアーの種類</span>
            <span class="value">{{ $albumImage->lure->name }}</span>
        </div>

        <div class="detailinfo">
            <span class="label">ルアーのサイズ</span>
            <span class="value">{{ $albumImage->lure->luresize }}</span>
        </div>
    </div>

    <div class="detailnotes">
        <span class="label">備考</span>
        <span class="notes">{{ $albumImage->notes }}
        </span>
    </div>

    <div class="btnarea">
        <form action="{{ route('albums.edit', ['id' => $albumImage->albumimage_id]) }}" method="get">
        @csrf
            <button type="submit" class="submitbtn">編集</button>
        </form>
    
        <form action="{{ route('album.destroy', ['id' => $albumImage->albumimage_id]) }}" method="POST">
        @csrf
        @method('DELETE') 
        <button type="submit" class="backbtn" onclick="return confirm('本当に削除しますか？');">削除</button>
        
    </div>
</div>


@endsection