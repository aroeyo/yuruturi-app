@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - トップページ')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/ranking.css') }}">
@endsection

@section('contents')

<div class="rankingarea">

    <div class="rankinglist">
        <h2 class="rankingtitle">-----大きさランキング-----</h2>
        <div class="rankingitem">
            <div class="rank">順位</div>
            <div class="rankname">名称</div>
            <div class="rankscore">大きさ</div>
        </div>
    
        @foreach ($sizeRanks as $sizeRank)
        <div class="rankingitem">
            <div class="rank">{{ $loop->index + 1}}位</div>
            <div class="rankname">{{ $sizeRank->species_name }}</div>
            <div class="rankscore">{{ $sizeRank->size }}cm</div>
        </div>
        @endforeach   
    </div>
   
    <div class="rankinglist">
        <h2 class="rankingtitle">-----ルアー釣果ランキング-----</h2>
        <div class="rankingitem">
            <div class="rank">順位</div>
            <div class="rankname">名称</div>
            <div class="rankscore">総数</div>
        </div>

        @foreach ($lureRanks as $lureRank)
        <div class="rankingitem">
            <div class="rank">{{ $loop->index + 1}}位</div>
            <div class="rankname">{{ $lureRank->name }} (サイズ: {{ $lureRank->luresize }})</div>
            <div class="rankscore">{{ $lureRank->album_image_count }}</div>
        </div>
        @endforeach

</div>

@endsection


