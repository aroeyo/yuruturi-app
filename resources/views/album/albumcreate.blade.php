@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - アルバム作成')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/albumaction.css') }}">
@endsection

@section('contents')

@if (count($errors) > 0)
<div class="errorview">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="albumdetail">

<form action="" method="POST" enctype="multipart/form-data" class="albumcreate" >

    <div class="uploadarea">
    <label for="image">画像をアップロード</label>
    <input type="file" id="image" name="image" accept="image/*" class="detailimagewrapper" required>
    <div id="preview" style="margin-top: 10px">
    </div>
    </div>

    <div class="detailinfo">
        <label for="species" class="label">魚種：</label>
        <input type="text" id="species" name="species" class="detailform" list="species-list" value="{{ old('species') }}" required>
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
            <input type="number" id="size" name="size" min="1" max="500" style="margin-top:5px; width:80px;" value="{{ old('size') }}" required>
        <span>cm</span>
        </div>
    </div>

    <div class="detailinfo">
        <label for="catchtime" class="label">釣れた時間：</label>
        <input type="datetime-local" id="catchtime" name="catchtime" class="detailform" value="{{ old('catchtime') }}" required>
    </div>

    <div class="detailinfo">
        <label for="lure" class="label">ルアー名（重量）：</label>
        <input type="text" id="lure" name="lure" class="detailform" value="{{ old('lure') }}" required>
        <select id="lureweight" name="lureweight" style="margin-top:5px; width:150px;" required>
            <option value="" disabled selected>選択してください</option>
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
        <input type="text" id="location" name="location" class="detailform" value="{{ old('location') }}" required>
    </div>

    <div class="detailnotes">
        <label for="notes" class="label">備考：</label>
        <div class="field">
            <textarea id="notes" name="notes" value="{{ old('notes') }}"></textarea>
        </div>
    </div>

    <div class="btnarea">
        <button type="submit" class="submitbtn">作成</button>
        <button type="buttun" class="backbtn" onclick="window.location.href='{{ url('/album/show/') }}'">戻る</button>
    </div>
</div>

<script>
    const imageInput = document.getElementById('image');
    const preview = document.getElementById('preview');

    imageInput.addEventListener('change', function() {
        //プレビューエリアをクリア
        preview.innerHTML ='';

        //ファイルが選択されている場合のみ処理を実行
        if(this.files && this.files[0]) {
            const file = this.files[0];
            
            //画像ファイルかどうかを確認
            if(!file.type.startsWith('image/')) {
                alert('画像ファイルを選択してください');
                return;
            }

            const reader = new FileReader();

            //ファイル読み込み完了時の処理
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '500px';
                img.style.maxHeight = '700px';
                img.style.display = 'block';
                img.style.margin = '0 auto';
                preview.appendChild(img);
            };

            //ファイルを読み込む
            reader.readAsDataURL(file);
        }
    });
</script>


@endsection