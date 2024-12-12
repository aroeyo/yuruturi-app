@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - アルバム作成')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/albumaction.css') }}">
@endsection

@section('contents')

<div class="albumdetail">

<form action="" method="POST" enctype="multipart/form-data">

    <div class="uploadarea">
    <label for="image">画像をアップロード</label>
    <input type="file" id="image" name="image" accept="image/*" class="detailimagewrapper">
    <div id="preview" style="margin-top: 10px">
    </div>
    </div>

    <div class="detailinfo">
        <label for="species" class="label">魚種：</label>
        <input type="text" id="species" name="species" class="detailform">
    </div>

    <div class="detailinfo">
        <label for="size" class="label">大きさ：</label>
       <input type="text" id="size" name="size" class="detailform">
    </div>

    <div class="detailinfo">
        <label for="catchtime" class="label">釣れた時間：</label>
        <input type="text" id="catchtime" name="catchtime" class="detailform">
    </div>

    <div class="detailinfo">
        <label for="lure" class="label">ルアーの種類：</label>
        <input type="text" id="lure" name="lure" class="detailform">
    </div>

    <div class="detailinfo">
        <label for="location" class="label">場所：</label>
        <input type="text" id="location" name="location" class="detailform">
    </div>

    <div class="detailnotes">
        <label for="notes" class="label">備考：</label>
        <div class="field">
            <textarea id="notes" name="notes"></textarea>
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