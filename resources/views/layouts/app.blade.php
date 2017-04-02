<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};

        @if(Auth::check())
            window.Laravel.Auth = {!! json_encode( Auth::user() ) !!};
            window.Laravel.Auth.Videos = {!! json_encode( Auth::user()->videos()->with(['channel', 'category'])->limit(4)->latest()->get() ) !!};
            window.Laravel.Channel = {!! json_encode( Auth::user()->channels()->select('id', 'name', 'logo')->first() ) !!};
        @endif
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {<span class="glyphicon glyphicon-play"></span>} {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input name="q" type="search" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default btn-search">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li>
                                <p class="navbar-btn">
                                    <a class="btn btn-primary" href="{{ url('/login') }}">Sign In</a>
                                </p>
                            </li>
                            <li><a href="{{ url('/register') }}">Sign Up</a></li>
                        @else
                            <li>
                                <router-link :to="{name: 'UploadPage'}">
                                    <span class="glyphicon glyphicon-open"></span>
                                </router-link>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="glyphicon glyphicon-bell"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-header">No Notification</li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="glyphicon glyphicon-user"></span> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-header">{{ Auth::user()->name }}</li>
                                    <li>
                                        <router-link :to="{ name: 'AccountPage' }">
                                            My Account
                                        </router-link>
                                    </li>
                                    <li class="nav-divider"></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer>
            <div class="text-center mt">
                <p>This is a demo for YouTube like app using Vue.js &amp; Laravel by <a target="_blank" href="http://www.QCode.in">www.QCode.in</a></p>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
