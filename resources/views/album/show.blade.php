@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - アルバム一覧')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/album.css') }}">
@endsection

@section('contents')

<div class="searcharea">
    <form action="{{ route('albums.show') }}" class="searchform" method="GET">
        <input type="text" name="name" placeholder="魚種名を入力" value="{{ request('name') }}">
        <button type="submit">検索</button>
    </form>
</div>

<hr>

<div class="albumlist">
    @foreach ($albumImages as $albumImage)
    <div class="albumitem">
        <div class="imagewrapper">
            <img 
                class="favorite-icon" 
                src="{{ $albumImage->favorites->where('user_id', Auth::id())->isNotEmpty() ? asset('images/heart2.png') : asset('images/heart1.png') }}" 
                data-albumimage-id="{{ $albumImage->albumimage_id }}" 
                data-favorited="{{ $albumImage->favorites->where('user_id', Auth::id())->isNotEmpty() ? 'true' : 'false' }}" 
                alt="Favorite Icon"
            >
            <a href="{{ route('album.id', ['id' => $albumImage->albumimage_id]) }}">
                <img class="albumimage" src="{{asset('storage/' . $albumImage->image_file) }}">
        </div>
        <div class="albuminfo">
            <p>{{ $albumImage->catchtime }}</p>
            <p>{{ $albumImage->size }}</p>
        </div></a>
    </div>
    @endforeach

@endsection

<script>
    window.toggleFavoriteUrl = "{{ route('favorites.toggle') }}";
    window.fovoriteHeart = "{{ asset('images/heart2.png') }}"
    window.normalHeart = "{{ asset('images/heart1.png') }}"
</script>
@push('scripts')
    <script src="{{ asset('js/favorite.js') }}"></script>
@endpush