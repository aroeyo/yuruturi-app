@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - 問い合わせページ')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('contents')

<h1>潮汐データグラフ</h1>

{{-- ユーザー入力フォーム --}}
<form action="" method="GET">
    <label for="pc">都道府県コード (例: 28)</label>
    <input type="number" name="pc" value="{{ old('pc') }}" required><br>

    <label for="hc">港コード (例: 9)</label>
    <input type="number" name="hc" value="{{ old('hc') }}" required><br>

    <label for="yr">年 (例: 2024)</label>
    <input type="number" name="yr" value="{{ old('yr') }}" required><br>

    <label for="mn">月 (例: 11)</label>
    <input type="number" name="mn" value="{{ old('mn') }}" required><br>

    <label for="dy">日 (例: 12)</label>
    <input type="number" name="dy" value="{{ old('dy') }}" required><br>

    <label for="rg">範囲 (例: day or week)</label>
    <select name="rg">
        <option value="day" {{ old('rg', 'day') == 'day' ? 'selected' : '' }}>日</option>
        <option value="week" {{ old('rg', 'week') == 'week' ? 'selected' : '' }}>週</option>
    </select><br>

    <button type="submit">グラフを表示</button>
</form>

{{-- エラーメッセージ --}}
@if (isset($error))
    <p>{{ $error }}</p>
@elseif (isset($tideData))
    {{-- 潮汐データの表示 --}}
    <h2>ポート情報</h2>
    <p><strong>港名 (日本語):</strong> {{ $tideData['port']['harbor_namej'] }}</p>
    <p><strong>港名 (英語):</strong> {{ $tideData['port']['harbor_name'] }}</p>
    <p><strong>緯度:</strong> {{ $tideData['port']['latitude'] }}</p>
    <p><strong>経度:</strong> {{ $tideData['port']['longitude'] }}</p>
    <p><strong>水位:</strong> {{ $tideData['port']['level'] }}</p>

    {{-- 画像の表示 --}}
    <h2>潮汐グラフ</h2>
    <img src="{{ $imageUrl }}" alt="潮汐グラフ">
@else
    <p>データがありません。</p>
@endif


@endsection


