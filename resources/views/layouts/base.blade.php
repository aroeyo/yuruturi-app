<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{asset('css/common.css')}}">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
        <link rel="stylesheet" href="{{asset('css/footer.css')}}">
        @yield('css')

    </head>

<body>
    <div class="container">
        <header>
            <x-header :showMenu="$showMenu ?? true" />
        </header>

        <main>
            @yield('contents')
        </main>

        <footer>
            <x-footer :showFooterMenu="$showFooterMenu ?? true" />
        </footer>
    </div>
    @stack('scripts')
</body>
</html>
