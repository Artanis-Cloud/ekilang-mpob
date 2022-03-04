<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Sistem e-Kilang</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/images/favicon.png') }}">



</head>

<body style="background:url({{ asset('theme/images/background/landing3.jpg') }});background-size:cover; max-width: 100%;
height: auto;">
    {{-- <div style="background:url({{ asset('theme/images/background/landing3.jpg') }});background-size:cover; max-width: 100%;
    height: auto;"> --}}





    {{-- <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"> --}}




    <div id="app">

        <nav class="shadow-sm navbar navbar-expand-md" style="background: transparent">

            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <img src="theme/images/background/favicon.png" height='45px' alt="">
                    <img src="theme/images/background/mspo.png" height='60px' alt="">
                </a>
                <div class="col-md-3"></div>
                <div class="col-md-1">
                    {{-- <a class="mx-1 navbar-brand" href="{{ url('/') }}">

                            <img src="theme/images/background/favicon.png"  height='45px' alt="">
                            <img src="theme/images/background/mspo.png"  height='60px' alt=""> --}}

                        <span class="mx-5 mb-0 text-center navbar-brand h1"
                            style="color: white; text-align:center; font-family:verdana"><b>
                                Sistem e-Kilang </b></span>


                    {{-- </a> --}}
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- @if (Route::has('login'))
                                    <li class="nav-item">
                                        <span class="mx-5 mb-0 text-center" style="color: white; text-align:center; font-family:verdana"><b>
                                            Log Masuk </b></span>
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main>
            @yield('content')
        </main>
    </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    </div>
</body>

</html>
