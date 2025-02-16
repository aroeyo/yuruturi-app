@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - 問い合わせページ')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/weather.css') }}">
@endsection

@section('contents')

<div class="weatherinfo">

<h1>潮汐情報検索</h1>

    <form action="{{ route('weather.show') }}" method="GET" class="tideform">
    @csrf
        <label for="port_code">港名</label>
        <select id="port_code" name="port_code" required onchange="document.getElementById('prefecture_code').value = this.options[this.selectedIndex].getAttribute('data-prefecture')" class="inputrange">
        @foreach($locationData as $prefectureCode => $prefecture)
            <optgroup label="{{ $prefecture['prefecture_name'] }}">
                @foreach ($prefecture['ports'] as $port)
                        <option value="{{ $port['port_code'] }}" " data-prefecture="{{ $prefectureCode }}">{{ $port['port_name'] }}</option>
                    @endforeach
                </optgroup>
        @endforeach
        </select>

        <input type="hidden" id="prefecture_code" name="prefecture_code" value="">

    <label for="year">年</label>
    <select id="year" name="year" required class="inputrange">
        @for($i = 2024; $i <= 2100; $i++)
            <option value="{{ $i }}">{{ $i }}年</option>
        @endfor
    </select>

    <label for="month">月</label>
    <select id="month" name="month" required class="inputrange">
        @for($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}">{{ $i }}月</option>
        @endfor
    </select>

    <label for="day">日</label>
    <select id="day" name="day" required class="inputrange">
        @for($i = 1; $i <= 31; $i++)
            <option value="{{ $i }}">{{ $i }}日</option>
        @endfor
    </select>

    <input type="hidden" id="range" name="range" value="day">

    <div id="resultArea"></div>

    <button type="submit" id="submitBtn">検索</button>
    </form>





{{-- エラーメッセージ --}}
@if (isset($error))
    <p>{{ $error }}</p>
@elseif (isset($tideData) && is_array($tideData) && count($tideData) > 0)
    @foreach($tideData as $date => $data)
        @if ($data && isset($data['port']))
            <div class="tidedata">
                <h2>{{ $data['port']['harbor_namej'] }}</h2>
                <p>{{ $date }}</p>
                {{-- 画像の表示 --}}
                <h2>潮汐グラフ</h2>
                <img src="{{ $imageUrls[$date] ?? '' }}" alt="潮汐グラフ">
            </div>
        @endif
    @endforeach
@else
    <p>データがありません。</p>
@endif
</div>

<div class="space"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection


