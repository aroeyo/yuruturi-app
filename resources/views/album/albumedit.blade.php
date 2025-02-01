@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - アルバム編集')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/albumaction.css') }}">
@endsection

@section('contents')


<form action="{{ route('album.update', ['id' => $albumImage->albumimage_id]) }}" method="POST" enctype="multipart/form-data" class="albumform" >
    @csrf
    @method('PUT')
    <div class="albumdetail">
    <div class="detailimagewrapper">
        <img src="{{asset('storage/' . $albumImage->image_file) }}">
    </div>

    <div class="detailinfo">
        <label for="species" class="label">魚種：</label>
        <input type="text" id="species" name="species" class="detailform" list="species-list" value="{{ $albumImage->species->name }}" required>
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
            <div class="sizearea">
            <input type="number" id="size" name="size" min="1" max="500" style="margin-top:5px; width:80px;" value="{{ $albumImage->size }}" required>
        <span>cm</span>
        </div>
    </div>

    <div class="detailinfo">
        <label for="catchtime" class="label">釣れた時間：</label>
        <input type="datetime-local" id="catchtime" name="catchtime" class="detailform" value="{{ \Carbon\Carbon::parse($albumImage->catchtime)->format('Y-m-d\TH:i') }}" required>
    </div>

    <div class="detailinfo">
        <label for="lure" class="label">ルアー名（重量）：</label>
        <input type="text" id="lure" name="lure" class="detailform" value="{{ $albumImage->lure->name }}" required>
        <select id="luresize" name="luresize" style="margin-top:5px; width:150px;" required>
            <option value="" disabled {{ empty($albumImage->lure->luresize) ? 'selected' : '' }}>選択してください</option>
            <option value="10" {{ $albumImage->lure->weight == 10 ? 'selected' : '' }}>10g</option>
            <option value="15" {{ $albumImage->lure->weight == 15 ? 'selected' : '' }}>15g</option>
            <option value="20" {{ $albumImage->lure->weight == 20 ? 'selected' : '' }}>20g</option>
            <option value="25" {{ $albumImage->lure->weight == 25 ? 'selected' : '' }}>25g</option>
            <option value="30" {{ $albumImage->lure->weight == 30 ? 'selected' : '' }}>30g</option>
            <option value="35" {{ $albumImage->lure->weight == 35 ? 'selected' : '' }}>35g</option>
            <option value="40" {{ $albumImage->lure->weight == 40 ? 'selected' : '' }}>40g</option>
            <option value="45" {{ $albumImage->lure->weight == 45 ? 'selected' : '' }}>45g</option>
            <option value="50" {{ $albumImage->lure->weight == 50 ? 'selected' : '' }}>50g</option>
        </select>
    </div>

    <div class="detailinfo">
        <label for="location" class="label">場所：</label>
        <input type="text" id="location" name="location" class="detailform" value="{{ $albumImage->location->name }}" required>
    </div>

    <div class="detailnotes">
        <label for="notes" class="label">備考：</label>
        <div class="field">
            <textarea id="notes" name="notes">{{ $albumImage->notes }}"</textarea>
        </div>
    </div>

    <div class="btnarea">
        <button type="submit" class="submitbtn">更新</button>

    </div>
</div>
</form>


@endsection