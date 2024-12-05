@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - トップページ')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('contents')

<div class="banner">
<img src="{{asset('images/topbanner.jpg')}}" width="1500px">
</div>

<div class="main">
<div class="about-site">
    <div class="about">
        <a href=""><img src="{{asset('images/aboutimage1.jpg')}}" alt="About Image 1" width="250px" height="auto"></a>
        <h3>天気情報</h3>
        <p>最新の天気予報や潮汐情報を一目で確認。釣りに最適な時間帯を見つけるために、リアルタイムで天候や潮の動きをチェックできます。</p>
    </div>
    <div class="about">
        <a href=""><img src="{{asset('images/aboutimage2.jpg')}}" alt="About Image 2" width="250px" height="auto"></a>
        <h3>釣果記録</h3>
        <p>あなたの釣果を簡単に記録し、写真と一緒に保存。釣った魚、場所、時間を後からいつでも振り返ることができます。</p>
    </div>
    <div class="about">
        <a href=""><img src="{{asset('images/aboutimage3.jpg')}}" alt="About Image 3" width="250px" height="auto"></a>
        <h3>ランキング</h3>
        <p>釣果をランキング形式で表示し、過去の記録と比較できます。このデータを参考にして、最適な釣り場やタイミングを見つけるヒントにもなります。</p>
    </div>
</div>
</div>

@endsection


