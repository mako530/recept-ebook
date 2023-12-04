<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/css/style.scss',
            'resources/js/app.js'])
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <i class="circle-preloader"></i>
        <img src="{{ asset('/img/core-img/salad.png') }}" alt="Saláta">
    </div>


    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="delicious-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="deliciousNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="{{ route('home') }}"><img src="{{ asset('img/core-img/logo.png') }}" style="height: 40px;" alt="Recipe E-book"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li @class(["active" => \Illuminate\Support\Facades\Route::is('home')])><a href="{{ route('home') }}">Főoldal</a></li>
                                    <li><a href="#">Receptek</a>
                                        <ul class="dropdown">
                                            @foreach (\App\Models\RecipeCategory::all() as $category)
                                                <li><a href="{{ route('category.show', $category) }}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @if (\Illuminate\Support\Facades\Auth::check())
                                        <li @class(["active" => \Illuminate\Support\Facades\Route::is('recipe.create')])><a href="{{ route('recipe.create') }}">Új recept</a></li>
                                        <li @class(["active" => \Illuminate\Support\Facades\Route::is('user.show')])><a href="{{ route('user.show') }}">Profilom</a></li>
                                        <li @class(["active" => \Illuminate\Support\Facades\Route::is('logout')])><a href="{{ route('logout') }}">Kijelentkezés</a></li>
                                    @else
                                        <li @class(["active" => \Illuminate\Support\Facades\Route::is('login')])><a href="{{ route('login') }}">Bejelentkezés</a></li>
                                        <li @class(["active" => \Illuminate\Support\Facades\Route::is('register')])><a href="{{ route('register') }}">Regisztráció</a></li>
                                    @endif

                                </ul>



                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between">
                    <!-- Footer Social Info -->
                    <div class="footer-social-info text-right">
                    </div>
                    <!-- Footer Logo -->
                    <div class="footer-logo">
                        <a href="index.html"><img src="{{ asset('img/core-img/logo.png') }}" style="height: 40px;" alt="Recept E-book"></a>
                    </div>
                    <!-- Copywrite -->
                    <p>
                        Made by LIR Team <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">SZE Team</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <script src="{{ asset('/vendor/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('/vendor/plugins/plugins.js') }}"></script>
    <script src="{{ asset('/vendor/active.js') }}"></script>
</body>
</html>
