<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') {{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- 追加内容 --}}
    <!-- Favicons -->
    <link href="img/favicon_sauna.png" rel="icon">
    <link href="img/favicon_sauna.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Raleway:400,300,700,900" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        {{-- <header class="gl-header">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3 shadow-sm">
                <div class="container">
                    <h1><a class="navbar-brand" href="{{ url('/') }}"></i> Sanavi - サウナレビューサイト </a></h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/"><i class="fa fa-home"></i> トップ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/post"><i class="fa fa-plus"></i> サ活投稿</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/place_post"><i class="fa fa-plus"></i> 施設投稿</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <!-- 一般ユーザ -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <i class="fa fa-sign-in"></i> {{ __('ja.Login') }}
                                        </a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <i class="fa fa-user"></i> {{ __('ja.Assign') }}
                                        </a>
                                    </li>
                                @endif
                                <!-- ログイン済みユーザ -->
                            @else
                                <!-- ドロップダウンメニュー -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> {{ __('ja.Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none"> @csrf </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header> --}}

        <header class="gl-header">
            <!-- Fixed navbar -->
            <div class="navbar navbar-inverse navbar-fixed-top navbar-expand-md">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}"></i>Sanavi</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/"><i class="fa fa-home"></i> HOME</a></li>
                            <li><a href="/"> Sanaviとは？</a></li>
                            <li><a href="/place_post"><i class="fa fa-plus"></i> 施設投稿</a></li>
                            <li><a href="/place_list"><i class="fa fa-list" aria-hidden="true"></i> 施設一覧</a></li>
                            <li><a data-toggle="modal" data-target="#myModal" href="#myModal"><i
                                        class="fa fa-envelope-o"></i></a></li>

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <i class="fa fa-sign-in"></i> {{ __('ja.Login') }}
                                        </a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <i class="fa fa-user"></i> {{ __('ja.Assign') }}
                                        </a>
                                    </li>
                                @endif
                                <!-- ログイン済みユーザ -->
                            @else
                                <!-- ドロップダウンメニュー -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> {{ __('ja.Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none"> @csrf </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </header>



        <main class="container">
            <div class="card">
                <h2 class="display-5 card-title text-center mt-4">@yield('title')</h2>
                <div class="card-body">@yield('content')</div>
            </div>
        </main>
    </div>

    <footer>
        <div id="copyrights">
            <div class="container">
              <p>
                &copy; Copyrights <strong>Tomohiro Nakano</strong>. All Rights Reserved
              </p>
            </div>
          </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
