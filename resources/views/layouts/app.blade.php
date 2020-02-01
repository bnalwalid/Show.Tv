<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Show.TV') }}</title>

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
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'ShowTv') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                    <li class="nav-item                    ">                      
                                    <a class="nav-link" href="{{url('/about')}}">About</a>
                                    </li>
                                    <li class="nav-item">                      
                                    <a class="nav-link" href="{{url('/tvshows')}}">TV-shows</a>
                                    </li>
                                    @if (session()->get('infouser'))
                                    @if(session()->get('infouser')->rule == 1)
                                        <li class="nav-item">                      
                                            <a class="nav-link" href="{{url('/admin')}}">Admin</a>
                                        </li>
                                    @endif
                                    @endif
                                  </ul>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            @if (!session()->get('infouser'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item  mr-3">  
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @else
                            <div class="dropdown  mr-3">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Welcome {{session()->get('infouser')->name}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    @if (!session()->get('infouser')->userimg)
                                    <img src="/img/user.png" width="150" class="rounded mx-auto d-block" alt="...">
                                    @else
                                    <img src="session()->get('infouser')->userimg" width="150" class="rounded mx-auto d-block" alt="...">
                                    @endif
                                  <button class="dropdown-item" type="button">change Password</button>
                                  <a href="/logout" class="dropdown-item" type="button">Logout</a>
                                </div>
                              </div>
                           
                            @endif
                            <form class="form-inline my-2 my-lg-0 center maring-10">
                                <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search">
                            </form>
                            <ul id="resultSearch" style="list-style-type: none;display: block;position: absolute;margin-left: 130px;margin-top:40px;background-color:#fff;border: 1px solid #ddd;width: 160px;padding:10px;display: none">
                             </ul>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container">
                @yield('content')
        </div>
        </main>
    </div>
</body>
</html>
