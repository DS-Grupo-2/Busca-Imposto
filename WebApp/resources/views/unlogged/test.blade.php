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
            margin-top: 50px;

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
                                <span class="nav-link-text">P??gina inicial</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2" style="margin-left: 2px;margin-right:2px">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white btn" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="ni ni-chart-bar-32"></i>
                                <span class="nav-link-text">Imposto</span>
                            </a>
                            <div class="dropdown-menu " style="background-color: #f6f5f8"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="ni ni-laptop"></i>
                                    <span class="nav-link-text">Categorias</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ni ni-laptop"></i>
                                    <span class="nav-link-text">Subcategorias</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ni ni-laptop"></i>
                                    <span class="nav-link-text">Produtos</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- Divider -->
                    {{-- <hr class="my-3"> --}}
                    <!-- Heading -->
                    {{-- <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Usu??rio</span>
                    </h6> --}}
                    <!-- Navigation -->
                    <ul class="navbar-nav md-3 mb-2" style="margin-left:2px;margin-right:2px">
                        <li class="nav-item">
                            <a class="nav-link text-white btn" href="{{ route('login') }}" {{-- target="_blank" --}}>
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">Login</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav md-3" style="margin-left:2px;margin-right:2px">
                        <li class="nav-item">
                            <a class="nav-link text-white btn" href="{{ route('register') }}" {{-- target="_blank" --}}>
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">Registre-se</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        {{-- <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
              <div class="form-group mb-0">
                <div class="input-group input-group-alternative input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                  </div>
                  <input class="form-control" placeholder="Pesquisar" type="text">
                </div>
              </div>
              <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                <span aria-hidden="true">??</span>
              </button>
            </form>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
              <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </div>
              </li>
              <li class="nav-item d-sm-none">
                <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                  <i class="ni ni-zoom-split-in"></i>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                  <!-- Dropdown header -->
                  <div class="px-3 py-3">
                    <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                  </div>
                  <!-- List group -->
                  <div class="list-group list-group-flush">
                    <a href="#!" class="list-group-item list-group-item-action">
                      <div class="row align-items-center">

                        <div class="col ml--2">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="mb-0 text-sm">John Snow</h4>
                            </div>
                            <div class="text-right text-muted">
                              <small>2 hrs ago</small>
                            </div>
                          </div>
                          <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                        </div>
                      </div>
                    </a>
                    <a href="#!" class="list-group-item list-group-item-action">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <!-- Avatar -->
                          <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                        </div>
                        <div class="col ml--2">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="mb-0 text-sm">John Snow</h4>
                            </div>
                            <div class="text-right text-muted">
                              <small>3 hrs ago</small>
                            </div>
                          </div>
                          <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                        </div>
                      </div>
                    </a>
                    <a href="#!" class="list-group-item list-group-item-action">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <!-- Avatar -->
                          <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                        </div>
                        <div class="col ml--2">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="mb-0 text-sm">John Snow</h4>
                            </div>
                            <div class="text-right text-muted">
                              <small>5 hrs ago</small>
                            </div>
                          </div>
                          <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                        </div>
                      </div>
                    </a>
                    <a href="#!" class="list-group-item list-group-item-action">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <!-- Avatar -->
                          <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                        </div>
                        <div class="col ml--2">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="mb-0 text-sm">John Snow</h4>
                            </div>
                            <div class="text-right text-muted">
                              <small>2 hrs ago</small>
                            </div>
                          </div>
                          <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                        </div>
                      </div>
                    </a>
                    <a href="#!" class="list-group-item list-group-item-action">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <!-- Avatar -->
                          <img alt="Image placeholder" src="../assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                        </div>
                        <div class="col ml--2">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="mb-0 text-sm">John Snow</h4>
                            </div>
                            <div class="text-right text-muted">
                              <small>3 hrs ago</small>
                            </div>
                          </div>
                          <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                        </div>
                      </div>
                    </a>
                  </div>
                  <!-- View all -->
                  <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ni ni-ungroup"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                  <div class="row shortcuts px-4">
                    <a href="#!" class="col-4 shortcut-item">
                      <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                        <i class="ni ni-calendar-grid-58"></i>
                      </span>
                      <small>Calendar</small>
                    </a>
                  </div>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >

                </a>
                <div class="dropdown-menu  dropdown-menu-right ">
                  <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                  </div>

<div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}"  class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>{{ __('Logout') }}</span>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

</a>
                  @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else

@endguest
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav> --}}
        <!-- Header -->
        <!-- Header -->
        <!-- Card header -->
        @include('flash-message')
        @yield('content')


        <div class="card principal">
            <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary customNav border-bottom"
                style="color:black">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Search form -->
                        <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Pesquisar Produtos" type="text">
                                </div>
                            </div>
                            <button type="button" class="close" data-action="search-close"
                                data-target="#navbar-search-main" aria-label="Close">
                                <span aria-hidden="true">??</span>
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
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ni ni-bell-55 text-dark"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                                    <!-- Dropdown header -->
                                    <div class="px-3 py-3">
                                        <h6 class="text-sm text-muted m-0">You have <strong
                                                class="text-primary">13</strong> notifications.</h6>
                                    </div>
                                    <!-- List group -->
                                    <div class="list-group list-group-flush">
                                        <a href="#!" class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <img src="/uploads/avatars/default.jpg">
                                                </div>
                                                <div class="col ml--2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h4 class="mb-0 text-sm">John Snow</h4>
                                                        </div>
                                                        <div class="text-right text-muted">
                                                            <small>2 hrs ago</small>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg"
                                                        class="avatar rounded-circle">
                                                </div>
                                                <div class="col ml--2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h4 class="mb-0 text-sm">John Snow</h4>
                                                        </div>
                                                        <div class="text-right text-muted">
                                                            <small>3 hrs ago</small>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">A new issue has been reported for Argon.
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg"
                                                        class="avatar rounded-circle">
                                                </div>
                                                <div class="col ml--2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h4 class="mb-0 text-sm">John Snow</h4>
                                                        </div>
                                                        <div class="text-right text-muted">
                                                            <small>5 hrs ago</small>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg"
                                                        class="avatar rounded-circle">
                                                </div>
                                                <div class="col ml--2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h4 class="mb-0 text-sm">John Snow</h4>
                                                        </div>
                                                        <div class="text-right text-muted">
                                                            <small>2 hrs ago</small>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <!-- Avatar -->
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-5.jpg"
                                                        class="avatar rounded-circle">
                                                </div>
                                                <div class="col ml--2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h4 class="mb-0 text-sm">John Snow</h4>
                                                        </div>
                                                        <div class="text-right text-muted">
                                                            <small>3 hrs ago</small>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0">A new issue has been reported for Argon.
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- View all -->
                                    <a href="#!"
                                        class="dropdown-item text-center text-primary font-weight-bold py-3">View
                                        all</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ni ni-ungroup text-dark"></i>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                                    <div class="row shortcuts px-4">
                                        <a href="#!" class="col-4 shortcut-item">
                                            <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                                <i class="ni ni-calendar-grid-58"></i>
                                            </span>
                                            <small>Calendar</small>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                            <li class="nav-item dropdown">
                                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <div class="media align-items-center">
                                        <span class="avatar avatar-sm rounded-circle">
                                            <img src="/uploads/avatars/default.jpg"
                                                style="width:34px; height:34px; position:relativa; top:10px; left:10px; border-radius:50%">
                                        </span>
                                        <div class="media-body text-dark ml-2  d-none d-lg-block">
                                            <span class="mb-0 text-sm  font-weight-bold text-dark">usuario</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu  dropdown-menu-right ">
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome!</h6>
                                    </div>




                                    <div class="dropdown-divider"></div>
                                    <a href="http://127.0.0.1:8000/logout" class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ni ni-user-run"></i>
                                        <span>Logout</span>

                                        <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST"
                                            class="d-none">
                                            <input type="hidden" name="_token"
                                                value="GjdsMGl3g5mmhZTc587uNHZNeieUN3HtMzCe7pD8">
                                        </form>

                                    </a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content custom ml-6 mr-3">
                <div class="row mb-6">
                    <div class="col-12">
                        <h1 class="ml-4 mb-4" style="color: black"> <b>
                                Categorias
                            </b> </h1>

                        <div class="main-section2">
                            <div class="container">
                                <div class="row">

                                    <div class="card"
                                        style="height:170px;width: 200px; margin:10px;border-radius:10%">
                                        <img class="card-img-top" style="margin-left: 7%; margin-top:2%;width:70px;height:70px"
                                            src="http://127.0.0.1:8000/assetsunlogged/img/new_logo.png"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <a href="">
                                                <h5 class="card-title">Produto</h5>
                                            </a>
                                            <p class="card-text">$PRE??O$.</p>
                                        </div>
                                    </div>
                                    <div class="card"
                                        style="height:170px;width: 200px; margin:10px;border-radius:10%">
                                        <img class="card-img-top" style="margin-left: 7%; margin-top:2%;width:70px;height:70px"
                                            src="http://127.0.0.1:8000/assetsunlogged/img/new_logo.png"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <a href="">
                                                <h5 class="card-title">Produto</h5>
                                            </a>
                                            <p class="card-text">$PRE??O$.</p>
                                        </div>
                                    </div>
                                    <div class="card"
                                        style="height:170px;width: 200px; margin:10px;border-radius:10%">
                                        <img class="card-img-top" style="margin-left: 7%; margin-top:2%;width:70px;height:70px"
                                            src="http://127.0.0.1:8000/assetsunlogged/img/new_logo.png"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <a href="">
                                                <h5 class="card-title">Produto</h5>
                                            </a>
                                            <p class="card-text">$PRE??O$.</p>
                                        </div>
                                    </div>
                                    <div class="card"
                                        style="height:170px;width: 200px; margin:10px;border-radius:10%">
                                        <img class="card-img-top" style="margin-left: 7%; margin-top:2%;width:70px;height:70px"
                                            src="http://127.0.0.1:8000/assetsunlogged/img/new_logo.png"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <a href="">
                                                <h5 class="card-title">Produto</h5>
                                            </a>
                                            <p class="card-text">$PRE??O$.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h1 class="ml-4 mb-4" style="color: black"> <b>
                                Produtos
                            </b> </h1>

                        <div class="main-section2">
                            <div class="container">
                                <div class="row">
                                    <div class="card produtos" style="width: 56rem;margin: 10px; ;border-radius:20px">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Categoria</th>
                                                                <th scope="col">Imagem</th>
                                                                <th scope="col">Criado</th>
                                                                <th scope="col">Atualizado</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        @foreach ($list as $item)
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">{{ $item->id }}</th>
                                                                    <td>{{ $item->NomeCategoria }}</td>
                                                                    <td><img height="50px"
                                                                            src="{{ asset('uploads/pictures/' . $item->picture) }}">
                                                                    </td>
                                                                    <td>{{ $item->Preco }}</td>
                                                                    <td>{{ $item->created_at }}</td>
                                                                    <td>{{ $item->updated_at }}</td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">{{ $item->id }}</th>
                                                                    <td>{{ $item->NomeCategoria }}</td>
                                                                    <td><img height="50px"
                                                                            src="{{ asset('uploads/pictures/' . $item->picture) }}">
                                                                    </td>
                                                                    <td>{{ $item->Preco }}</td>
                                                                    <td>{{ $item->created_at }}</td>
                                                                    <td>{{ $item->updated_at }}</td>
                                                                </tr>
                                                            </tbody>

                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="header bg-primary pb-6">

      </div>
      <!-- Page content -->
      <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card home ">
              <!-- Card header -->
                @include('flash-message')
                @yield('content')


              <div class="card-footer py-4">

            </div>
            </div>
          </div>
        </div> --}}

    </div>
    <script src="{{ asset('assetslogged/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assetslogged/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetslogged/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assetslogged/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assetslogged/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('assetslogged/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assetslogged/js/sweetalert.js') }}"></script>
    <script src="{{ asset('common/custom.js') }}"></script>
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
