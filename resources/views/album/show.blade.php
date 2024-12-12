@extends('layouts.base')

@section('title', 'ゆる釣り釣果ログ - アルバム一覧')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/album.css') }}">
@endsection

@section('contents')

<div class="seacharea">
</div>

<div class="sortarea">
</div>

<div class="sortarea">
</div>

<hr>

<div class="albumlist">
    <div class="albumitem">
        <div class="imagewrapper">
            <a href=""><img src="{{asset('images/test1.jpg')}}">
        </div>
        <div class="albuminfo">
            <p>2024年12月8日 5時30分</p>
            <p>86cm</p>
        </div></a>
    </div>

    <div class="albumitem">
        <div class="imagewrapper">
            <a href=""><img src="{{asset('images/test2.jpg')}}">
        </div>
        <div class="albuminfo">
            <p>2024年12月8日 5時30分</p>
            <p>86cm</p>
        </div></a>
    </div>

    <div class="albumitem">
        <div class="imagewrapper">
            <a href=""><img src="{{asset('images/test3.jpg')}}">
        </div>
        <div class="albuminfo">
            <p>2024年12月8日 5時30分</p>
            <p>86cm</p>
        </div></a>
    </div>

    <div class="albumitem">
        <div class="imagewrapper">
            <a href=""><img src="{{asset('images/test4.jpg')}}">
        </div>
        <div class="albuminfo">
            <p>2024年12月8日 5時30分</p>
            <p>86cm</p>
        </div></a>
    </div>

    <div class="albumitem">
        <div class="imagewrapper">
            <a href=""><img src="{{asset('images/test5.jpg')}}">
        </div>
        <div class="albuminfo">
            <p>2024年12月8日 5時30分</p>
            <p>86cm</p>
        </div></a>
    </div>

    <div class="albumitem">
        <div class="imagewrapper">
            <a href=""><img src="{{asset('images/test1.jpg')}}">
        </div>
        <div class="albuminfo">
            <p>2024年12月8日 5時30分</p>
            <p>86cm</p>
        </div></a>
    </div>

    <div class="albumitem">
        <div class="imagewrapper">
            <a href=""><img src="{{asset('images/test2.jpg')}}">
        </div>
        <div class="albuminfo">
            <p>2024年12月8日 5時30分</p>
            <p>86cm</p>
        </div></a>
    </div>

    <div class="albumitem">
        <div class="imagewrapper">
            <a href=""><img src="{{asset('images/test3.jpg')}}">
        </div>
        <div class="albuminfo">
            <p>2024年12月8日 5時30分</p>
            <p>86cm</p>
        </div></a>
    </div>

    <div class="albumitem">
        <div class="imagewrapper">
            <a href=""><img src="{{asset('images/test4.jpg')}}">
        </div>
        <div class="albuminfo">
            <p>2024年12月8日 5時30分</p>
            <p>86cm</p>
        </div></a>
    </div>

    <div class="albumitem">
        <div class="imagewrapper">
            <a href=""><img src="{{asset('images/test5.jpg')}}">
        </div>
        <div class="albuminfo">
            <p>2024年12月8日 5時30分</p>
            <p>86cm</p>
        </div></a>
    </div>
</div>



@endsection