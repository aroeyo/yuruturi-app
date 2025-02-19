@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - お気に入り一覧')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/album.css') }}">
@endsection

@section('contents')

<div class="albumlist">
    @foreach ($favorites as $favorite)
    <div class="albumitem">
        <div class="imagewrapper">
            <a href="{{ route('favorite.id', ['id' => $favorite->albumImage->albumimage_id]) }}" loading="lazy">
                <img class="albumimage" src="{{asset('storage/' . $favorite->albumImage->image_file) }}">
        </div>
        <div class="albuminfo">
            <p>{{ $favorite->albumImage->catchtime }}</p>
            <p>{{ $favorite->albumImage->size }}</p>
        </div></a>
    </div>
    @endforeach
</div>

    <div class="paginatearea">
        <div class="pagination">
            {{ $favorites->links() }}
        </div>
    </div>

@endsection