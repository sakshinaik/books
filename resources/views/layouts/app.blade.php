<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Digital Bookshelf</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet" type="text/css">

        <!-- Additional Styles -->
        @if(Route::currentRouteName() != 'welcome')
            <link href="/css/nav.css" rel="stylesheet" type="text/css">
        @endif

        @stack('styles')
    </head>
    <body>
        <header>
            <a href="{{ Auth::check() ? route('home') : route('welcome') }}" class="no-style">
                <h1 id="title" class="center-text">Digital Bookshelf</h1>
            </a>
        </header>

        @include('elements.nav')
        
        <section id="main">
            @yield('content')
        </section>
    </body>
</html>
