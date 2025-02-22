@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - トップページ')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('contents')

<div class="banner">
<img src="{{asset('images/topbanner.webp')}}" width="1500px">
</div>

<div class="main">
<div class="about-site">
    <div class="about">
        <a href="{{ route('weather.show') }}"><img src="{{asset('images/aboutimage_1.webp')}}" alt="About Image 1" width="250px" height="auto"></a>
        <h3>潮汐情報</h3>
        <p>釣りに最適な時間帯を探すため、好きな場所や日付で潮汐情報を検索。最新の潮の動きをリアルタイムで確認できます。</p>
    </div>
    <div class="about">
        <a href="{{ route('albums.create') }}"><img src="{{asset('images/aboutimage2.webp')}}" alt="About Image 2" width="250px" height="auto"></a>
        <h3>釣果記録</h3>
        <p>あなたの釣果を簡単に記録し、写真と一緒に保存。釣った魚、場所、時間を後からいつでも振り返ることができます。</p>
    </div>
    <div class="about">
        <a href="{{ route('ranking.show') }}"><img src="{{asset('images/aboutimage3.webp')}}" alt="About Image 3" width="250px" height="auto"></a>
        <h3>ランキング</h3>
        <p>釣果をランキング形式で表示し、過去の記録と比較できます。このデータを参考にして、最適な釣り場やタイミングを見つけるヒントにもなります。</p>
    </div>
</div>
</div>

@endsection


