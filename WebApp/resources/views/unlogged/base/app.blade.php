<!--

=========================================================
* Gaia Bootstrap Template - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/gaia-bootstrap-template
* Licensed under MIT (https://github.com/creativetimofficial/gaia-bootstrap-template/blob/master/LICENSE.md)
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assetsunlogged/img/logo4.png') }}" >
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{-- {{ config('app.name', 'Laravel') }} --}}Busca Imposto </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="{{ asset('assetsunlogged/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assetsunlogged/css/gaia.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assetsUnlogged/css/fonts/pe-icon-7-stroke.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsunlogged/css/custom.css') }}" rel="stylesheet" />
    <script src="{{ asset('assetsUnlogged/js/jquery.min.js') }}" type="text/javascript"></script>
    <script>
        const base_url = "{{ url('') }}"
    </script>
    <script src="{{ asset('assetsUnlogged/js/custom.js') }}" type="text/javascript"></script>


</head>

@php
use App\Categories as CategoriesModel;
$categories = CategoriesModel::all();

@endphp
<body>
    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" style="background-color: #9babf1">
        <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
        <div class="container">
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="{{ url('') }}" class="navbar-brand " id="buscaimposto" style="margin-bottom:15%;">

                    <img src="assetsunlogged/img/logo4.png" alt="Busca Imposto" width=172 height=86
                        href="{{ url('') }}" id="buscaimposto">
                </a>
            </div>
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right navbar-uppercase">

                    <li style="margin-right:50px">
                        <form class="form-inline" style="margin-top: 5%">
                            <input class="form-control searchInput" url="{{ route('search-by-product') }}"
                                customInMethod="GET" style="width: 110%" type="search" placeholder="Pesquisar Produto"
                                aria-label="Search">
                        </form>

                        <ul class="list-group search-custom">
                        </ul>
                    </li>
                    <li class="dropdown">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal"  data-target="#exampleModalCenter">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal"  data-target="#exampleModalCenterRegister">{{ __('Registre-se') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
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
                    <ul class="dropdown-menu dropdown-danger">
                        <li>
                            <a href="#"><i class="fa fa-facebook-square"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i>Instagram</a>
                        </li>
                    </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>


          <!-- Modal -->

                    @include('auth.login')
                    @include('auth.register')


        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #8391d8">
            <ul class="navbar-nav mr-auto" style="list-style-type: none; margin:5px">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories">Impostos por Categoria</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  href="/categories">Categorias</a>
                </li> --}}

                <li class="nav-item">
                    <a onclick="dropDownFunction()" class="dropcustbtn">Categorias</a>
                    <div id="mydropcustdown" class="dropcustdown-content">
                        @foreach($categories as $category)
                            <a href="{{ url('/get-products?category='.$category->id) }}" >{{ $category->NomeCategoria }}</a>
                        @endforeach
                    </div>
                <li class="nav-item">
                    <a class="nav-link" href="/home">Meu Perfil</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="section section-header conteudo">
        <div class="parallax" id="parallax">
            <div class="container" id="banner">
                <div class="content">
                    <div class="title-area">
                        <h2>Compare preços</h2>
                        <h1 class="title-modern"></h1>
                        <h3>
                            </h2>
                            <div class="separator line-separator">♦</div>
                    </div>

                    {{-- <div class="button-get-started">
                        <a href="http://www.creative-tim.com/product/gaia-bootstrap-template" target="_blank"
                            class="btn btn-white btn-fill btn-lg text">
                            Saiba mais
                        </a>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>

    <!-- This is where our app content goes :D -->
    <div class="custom-content">
        @yield('content')
    </div>
    <!-- end our content -->

{{-- 
    <footer class="footer footer-big footer-color-black" data-color="black">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3">
                    <div class="info">
                        <h5 class="title">Company</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Find offers</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 col-sm-3">
                    <div class="info">
                        <h5 class="title"> Help and Support</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="info">
                        <h5 class="title">Latest News</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i> <b>Get Shit Done</b> The best kit in the market
                                        is
                                        here, just give it a try and let us...
                                        <hr class="hr-small">
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-1 col-sm-3">
                    <div class="info">
                        <h5 class="title">Follow us on</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#" class="btn btn-social btn-facebook btn-simple">
                                        <i class="fa fa-facebook-square"></i> Facebook
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-social btn-dribbble btn-simple">
                                        <i class="fa fa-dribbble"></i> Dribbble
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <hr>
            <div class="copyright">
                <script>
                    document.write(new Date().getFullYear())
                </script> Creative Tim, made with love
            </div>
        </div>
    </footer> --}}

</body>

<!--   core js files    -->
<script src="{{ asset('assetsUnlogged/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assetsUnlogged/js/bootstrap.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assetsUnlogged/js/chart.js') }}"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="{{ asset('assetsUnlogged/js/modernizr.js') }}"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="{{ asset('assetsUnlogged/js/gaia.js') }}"></script>
<script type="text/javascript" src="{{ asset('assetsUnlogged/js/chart.js') }}"></script>

</html>
