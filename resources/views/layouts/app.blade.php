<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <x-embed-styles />
    

</head>
<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0" nonce="9LT6OrGb"></script>
    <div id="app"  style="height:100%; min-height:100vh">
        <nav class="navbar navbar-expand-md navbar-dark bg-black text-light shadow-sm fixed-top ">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    {{ config('app.name', 'Papua News') }}
                </a>
                <button class="navbar-toggler navbar-black text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-light">
                        <!-- Authentication Links -->
                        <li class="nav-item"><a class="nav-link text-light" href="/news/category/World">World</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="/news/category/Politics">Politics</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="/news/category/Culture">Culture</a></li>
                        <li class="nav-item"><a class="nav-link text-light" href="/news/category/Travel">Travel</a></li>
                        @guest
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @else
                        @if (Auth::user()->role == 'Admin')
                            <li class="nav-item"><a class="nav-link text-light" href="{{ route('createpost') }}">Create News</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="/news/headline">Change Headline</a></li>
                        @endif
                            <li class="nav-item dropdown"><a id="navbarDropdown" class="nav-link text-light dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{
                                        { __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                </div>
                            </li>
                        @endguest
                        <form class="form-inline my-2 my-lg-0" method="POST" > @csrf
                            <input class="form-control mx-sm-1" type="search" placeholder="Search News" aria-label="Search" name="query" value="">
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <main class="py-4 mt-5">
                @yield('content')
            </main>
        </div>
    </div>
    <footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
          <small class="d-block mb-3 text-muted">© 2021</small>
        </div>
        <div class="col-6 col-md">
          <h5>Categories</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="/news/category/World">World</a></li>
            <li><a class="text-muted" href="/news/category/Politics">Politics</a></li>
            <li><a class="text-muted" href="/news/category/Travel">Travel</a></li>
            <li><a class="text-muted" href="/news/category/Culture">Culture</a></li>
          </ul>
        </div>
      </div>
    </footer>
</body>
</html>
