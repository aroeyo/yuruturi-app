@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - トップページ')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/ranking.css') }}">
@endsection

@section('contents')

<div class="rankingarea">
   
    <div class="rankinglist">
        <h2 class="rankingtitle">-----ルアー釣果ランキング-----</h2>
        <div class="rankingitem">
            <div class="rank">順位</div>
            <div class="rankname">名称</div>
            <div class="rankscore">総数</div>
        </div>
    
        <div class="rankingitem">
            <div class="rank">1位</div>
            <div class="rankname">仮</div>
            <div class="rankscore">仮総数</div>
        </div>

        <div class="rankingitem">
            <div class="rank">2位</div>
            <div class="rankname">仮</div>
            <div class="rankscore">仮総数</div>
        </div>

        <div class="rankingitem">
            <div class="rank">3位</div>
            <div class="rankname">仮</div>
            <div class="rankscore">仮総数</div>
        </div>

        <div class="rankingitem">
            <div class="rank">4位</div>
            <div class="rankname">仮</div>
            <div class="rankscore">仮総数</div>
        </div>

        <div class="rankingitem">
            <div class="rank">5位</div>
            <div class="rankname">仮</div>
            <div class="rankscore">仮総数</div>
        </div>    
    </div>


    <div class="rankinglist">
        <h2 class="rankingtitle">-----大きさランキング-----</h2>
        <div class="rankingitem">
            <div class="rank">順位</div>
            <div class="rankname">名称</div>
            <div class="rankscore">総数</div>
        </div>
    
        <div class="rankingitem">
            <div class="rank">1位</div>
            <div class="rankname">仮</div>
            <div class="rankscore">仮総数</div>
        </div>

        <div class="rankingitem">
            <div class="rank">2位</div>
            <div class="rankname">仮</div>
            <div class="rankscore">仮総数</div>
        </div>

        <div class="rankingitem">
            <div class="rank">3位</div>
            <div class="rankname">仮</div>
            <div class="rankscore">仮総数</div>
        </div>

        <div class="rankingitem">
            <div class="rank">4位</div>
            <div class="rankname">仮</div>
            <div class="rankscore">仮総数</div>
        </div>

        <div class="rankingitem">
            <div class="rank">5位</div>
            <div class="rankname">仮</div>
            <div class="rankscore">仮総数</div>
        </div>    
    </div>

</div>

@endsection


