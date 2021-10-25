<?php
    use App\Http\Middleware\Authenticate as Authc;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Busca Imposto</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assetsunlogged/img/logo4.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assetslogged/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetslogged/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assetslogged/css/argon.css?v=1.2.0') }}" type="text/css">
    <script src="{{ asset('assetslogged/vendor/jquery/dist/jquery.min.js') }}"></script>

    <style>
        body {
            background-color: #9BABF1;
        }

        .bg-white {
            background-color: #9BABF1 !important;
        }

        .navbar-vertical.navbar-light {
            border-color: rgb(0 0 0 / 0%);
            background-color: #f6f9fc;
        }

        .navbar-vertical {
            padding-top: 0;
            border-width: 0 0 1px 0;
            border-style: solid;
            box-shadow: 0 0 2rem 0 rgb(136 152 170 / 0%);
        }

        .header.bg-primary {
            background-color: #5e72e400 !important;
        }

        .card.home {
            height: 100%;
        }

        .card.principal {
            margin-top: 25px;
            border-top-left-radius: 40px;
            height: 700px;
            margin-bottom: 00px;
            margin-top: 25px;
            border-top-left-radius: 40px;
            background-color: #F6F5F8;
            border-top-right-radius: 0px;
            height: 100%;

        }

        .navbar-vertical .navbar-brand-img,
        .navbar-vertical .navbar-brand>img {
            max-width: 100%;
            max-height: 5rem;
        }

        .bg-primary.customNav {
            background-color: #5e72e400 !important;
            margin-top: 24px;
        }

        .input-group-alternative,
        .focused.input-group-alternative {
            /* transition: box-shadow .15s ease; */
            /* border: 0; */
            box-shadow: 0px 0px 0px 2px rgb(119 119 119), 0 1px 0 rgb(0 0 0);
            border-color: black !important;
            border-radius: unset;
        }

        .focused .input-group-alternative {
            box-shadow: 0px 0px 0px 2px rgb(129 129 129), 0 1px 3px rgb(0 0 0 / 8%) !important;
        }

        .content.custom {
            margin-top: 10px;

        }

        .card {
            overflow: hidden;
        }

        .card-text {
            word-wrap: break-word;
        }

        .btn:hover {
            background-color: #7399F6;
        }

        .card.principal {}

        .page-link {

            border: none !important;
            background-color: #f6f5f800 !important;
            width: 75px!important;
        }

    </style>
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center mb-5">
                <a class="navbar-brand" style="width:70% ; height:70%;" href="http://127.0.0.1:8000/">
                    <img src="{{ url('') }}/assetsunlogged/img/logo4.png" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav mb-2" style="margin-left:2px;margin-right:2px">
                        <li class="nav-item">
                            <a class="nav-link text-white btn" href="http://127.0.0.1:8000/">
                                <i class="ni ni-cart"></i>
                                <span class="nav-link-text">Página inicial</span>
                            </a>
                        </li>
                    </ul>
                    {{-- <ul class="navbar-nav mb-2" style="margin-left: 2px;margin-right:2px">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white btn" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="ni ni-chart-bar-32"></i>
                                <span class="nav-link-text">Imposto</span>
                            </a>
                            <div class="dropdown-menu " style="background-color: #f6f5f8"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user-info') }}">
                                    <i class="ni ni-laptop"></i>
                                    <span class="nav-link-text">Usuário</span>
                                </a>
                            </div>
                        </li>
                    </ul> --}}


                    <ul class="navbar-nav md-3 mb-2" style="margin-left:2px;margin-right:2px">
                        <li class="nav-item">
                            <a class="nav-link text-white btn" href="{{ route('user-info') }}" {{-- target="_blank" --}}>
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">Usuário</span>
                            </a>
                        </li>
                    </ul>
                    @if(Authc::isAdmin())
                        <ul class="navbar-nav md-3 mb-2" style="margin-left:2px;margin-right:2px">
                            <li class="nav-item">
                                <a class="nav-link text-white btn" href="{{ route('categories-view') }}" {{-- target="_blank" --}}>
                                    <i class="ni ni-single-02"></i>
                                    <span class="nav-link-text">Categorias</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav md-3 mb-2" style="margin-left:2px;margin-right:2px">
                            <li class="nav-item">
                                <a class="nav-link text-white btn" href="{{ route('subcategories-view') }}" {{-- target="_blank" --}}>
                                    <i class="ni ni-single-02"></i>
                                    <span class="nav-link-text">SubCategorias</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav md-3 mb-2" style="margin-left:2px;margin-right:2px">
                            <li class="nav-item">
                                <a class="nav-link text-white btn" href="{{ route('products-view') }}" {{-- target="_blank" --}}>
                                    <i class="ni ni-single-02"></i>
                                    <span class="nav-link-text">Produtos</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="navbar-nav md-3" style="margin-left:2px;margin-right:2px">
                            <li class="nav-item">
                                <a class="nav-link text-white btn" href="{{ url('/system/get-bests') }}" {{-- target="_blank" --}}>
                                    <i class="ni ni-single-02"></i>
                                    <span class="nav-link-text">The bests</span>
                                </a>
                            </li>
                        </ul>
                    @endif

                    <ul class="navbar-nav md-3 mb-2" style="margin-left:2px;margin-right:2px">
                        <li class="nav-item">
                            <a class="nav-link text-white btn" href="{{ url('/system/saved-products') }}" {{-- target="_blank" --}}>
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">Produtos Salvos</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="card principal">
            <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary customNav border-bottom"
                style="color:black">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Search form -->
                        <form class="navbar-search navbar-search-light form-inline mr-sm-3" method="GET"
                            id="navbar-search-main">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input class="form-control generalSystemSearch" name="search"
                                        value="{{ $defSearch }}" placeholder="Pesquisar" type="text">
                                </div>
                            </div>
                            <button type="button" class="close" data-action="search-close"
                                data-target="#navbar-search-main" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </form>
                        <!-- Navbar links -->
                        <ul class="navbar-nav align-items-center  ml-md-auto ">
                            <li class="nav-item d-xl-none">
                                <!-- Sidenav toggler -->
                                <div class="pr-3 sidenav-toggler sidenav-toggler-dark active" data-action="sidenav-pin"
                                    data-target="#sidenav-main">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item d-sm-none">
                                <a class="nav-link" href="#" data-action="search-show"
                                    data-target="#navbar-search-main">
                                    <i class="ni ni-zoom-split-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content custom ml-2 mr-2">
                <div class="row mb-6">
                    <div class="col-12">
                        @include('flash-message')

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>


    </div>
{{--
    <a href="http://127.0.0.1:8000/logout" class="dropdown-item"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ni ni-user-run"></i>
        <span>Logout</span>

        <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST"
            class="d-none">
            <input type="hidden" name="_token"
                value="GjdsMGl3g5mmhZTc587uNHZNeieUN3HtMzCe7pD8">
        </form>

    </a> --}}
    <script src="{{ asset('assetslogged/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetslogged/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assetslogged/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assetslogged/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('assetslogged/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assetslogged/js/sweetalert.js') }}"></script>
    <script src="{{ asset('common/custom.js') }}"></script>
    <script src="{{ asset('assetsUnlogged/js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assetslogged/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assetslogged/js/argon.js?v=1.2.0') }}"></script>

    <!--   core js files    -->
    <script src="{{ asset('assetsUnlogged/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assetsUnlogged/js/bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assetsUnlogged/js/chart.js') }}"></script>

    <!--  js library for devices recognition -->
    <script type="text/javascript" src="{{ asset('assetsUnlogged/js/modernizr.js') }}"></script>

    <!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
    <script type="text/javascript" src="{{ asset('assetsUnlogged/js/gaia.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assetsUnlogged/js/chart.js') }}"></script>
</body>

</html>
