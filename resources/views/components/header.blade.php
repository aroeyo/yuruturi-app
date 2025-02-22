<div class="header-main wrapper"> 
    <div>
        <a href="{{ route('home') }}"><img src="{{asset('images/title-logo.webp')}}" alt="サイトロゴ" class="logo"></a>
   </div>

<div class="menu-trigger">
    <span></span>
    <span></span>
    <span></span>
</div>

@if($showMenu)

    @if(request()->routeIs('home'))
    @auth
        <div class="user-nav">  
            <a href="{{ route('favorite.show') }}">お気に入り</a>
            <a href="{{ route('profile.edit') }}">マイページ</a>

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
            <a href="{{ route('favorite.show') }}">お気に入り</a>
            <a href="{{ route('profile.edit') }}">マイページ</a>

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
            <li><a href="{{ route('albums.create') }}">釣果登録</a></li>
            <li><a href="{{ route('albums.show') }}">アルバム</a></li>
            <li><a href="{{ route('weather.show') }}">潮汐情報</a></li>
            <li><a href="{{ route('ranking.show') }}">ランキング</a></li>
            <li><a href="{{ route('contact.show') }}">問い合わせ</a></li>
        </ul>



        <!-- スマホ用のuser-nav（navの中に追加） -->
        <div class="sp-menu">
                @if(request()->routeIs('home'))
                    @auth
                        <a href="{{ route('favorite.show') }}">お気に入り</a>
                        <a href="{{ route('profile.edit') }}">マイページ</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="userbtn">ログアウト</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">ログイン</a>
                        <a href="{{ route('register') }}">会員登録</a>
                    @endauth
                @endif

                @if(!request()->routeIs('home'))
                    @auth
                        <a href="{{ route('favorite.show') }}">お気に入り</a>
                        <a href="{{ route('profile.edit') }}">マイページ</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="userbtn">ログアウト</button>
                        </form>
                    @endauth
                @endif
            </div>
    </nav>
@endif



<hr>

@push('scripts')
    <script src="{{ asset('js/header.js') }}"></script>
@endpush
