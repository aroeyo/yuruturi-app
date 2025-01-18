<div class="header-main wrapper"> 
    <div>
        <a href="{{ route('home') }}"><img src="{{asset('images/title-logo.png')}}" alt="サイトロゴ" class="logo" width="150px" height="auto"></a>
   </div>

@if($showMenu)

    @if(request()->routeIs('home'))
    @auth
        <div class="user-nav">  
            <a href="">お気に入り</a>
            <a href="">マイページ</a>

            <form method="POST" action="{{ route('logout') }}">
            @csrf
                <button type="submit" class="userbtn">ログアウト</button>
            </form>
        </div>
    @else
        <div class="user-nav">
            <a href="{{ route('login') }}">ログイン</a>
            <a href="{{ route('register') }}">会員登録</a>
        </div>
    @endauth
    @endif

    @if(!request()->routeIs('home'))
    @auth
    <div class="user-nav">  
            <a href="">お気に入り</a>
            <a href="">マイページ</a>

            <form method="POST" action="{{ route('logout') }}">
            @csrf
                <button type="submit" class="userbtn">ログアウト</button>
            </form>
        </div>
    @endauth
    @endif
</div>

    <nav>
        <ul class="main-nav">
            <li><a href="{{ route('album.create') }}">釣果登録</a></li>
            <li><a href="{{ route('albums.show') }}">アルバム</a></li>
            <li><a href="">気象情報</a></li>
            <li><a href="{{ route('ranking') }}">ランキング</a></li>
            <li><a href="{{ route('contact.show') }}">問い合わせ</a></li>
        </ul>
    </nav>
@endif

<hr>
