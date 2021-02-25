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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md header">
            <div class="container">
                <a class="navbar-brand text-white header__navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/free-logo-fullwhite.svg') }}" alt="Freeads Logo" class="header__logo">
                </a>
                <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto align-items-baseline">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link header__nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                            @if (Route::has('login'))
                                <li class="nav-item ml-md-3">
                                    <a class="btn btn-custom-secondary" href="{{ route('login') }}">{{ __('Log in') }}</a>
                                </li>
                            @endif
                            
                        @else

                            @if (Auth::user()->admin)
                                <li class="nav-item">
                                    <a class="nav-link header__nav-link" href="{{ route('ads.index') }}">{{ __('Ads administration') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link header__nav-link" href="{{ route('myinfo') }}">{{ __('Users administration') }}</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link header__nav-link" href="{{ route('ads.index') }}">{{ __('My ads') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link header__nav-link" href="{{ route('myinfo') }}">{{ __('Profile') }}</a>
                                </li>
                            @endif

                            <li class="nav-item ml-md-3">
                                <a class="btn btn-custom-secondary" href="{{ route('logout') }}">{{ __('Log out') }}</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="d-flex w-100 h-100 justify-content-center align-items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/free-logo-white-redpin.svg') }}" alt="Freeads Logo" class="footer__logo">
                </a>
            </div>
        </footer>
    </div>
</body>
</html>
