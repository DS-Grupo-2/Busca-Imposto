{{-- @extends('unlogged.base.app')
@section('content')
<link href="{{ asset('assetsUnlogged/css/customAuth.css') }}" rel="stylesheet"> --}}

{{-- content goes here --}}
<!-- <canvas id="myChart" width="400" height="400"></canvas> -->

{{-- end of content --}}

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assetslogged/img/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assetslogged/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assetslogged/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assetslogged/css/argon.css?v=1.2.0') }}" type="text/css">
</head>


<style>
  body {
    font-family: Open Sans, sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    margin: 0;
    text-align: left;
    color: #525f7f;
    background-color: #9babf1;
  }
</style>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light" style="background-color: #9BABF1" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{url('')}}/assetsunlogged/img/logo4.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link btn text-center" style="background-color: #7399F6;border-left-width: 0px;border-right-width: 0px;margin-left: 20px;margin-right: 20px;" href="dashboard.html">
                <i class="ni ni-tv-2 text-white"></i>
                <span class="nav-link-text text-white">Eletrônicos</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link btn text-center" style="background-color: #7399F6;border-left-width: 0px;border-right-width: 0px;margin-left: 20px;margin-right: 20px;" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                <i class="ni ni-bold-left text-white"></i>
                <span class="nav-link-text text-white">Sair</span>
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
      <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom" style="background-color: #9BABF1">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
              <div class="form-group mb-0">
                <div class="input-group input-group-alternative input-group-merge">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                  </div>
                  <input class="form-control" placeholder="Search" type="text">
                </div>
              </div>
              <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                <span aria-hidden="true">×</span>
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

            </ul>

          </div>
        </div>
      </nav>

    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">


            <!-- Card header -->
            @include('flash-message')
            <div style="background-color:red">
              glugluglug

              @yield('content')
              <div class="flex-center position-ref full-height">
                <div class="content">
                  <div class="title m-b-md">
                    Busca Imposto
                    <br>
                    Erick
                  </div>

                  <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Card footer -->
            {{-- <div class="card-footer py-4"> --}}
            {{--
                <nav aria-label="...">
                  <ul class="pagination justify-content-end mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <li class="page-item active">
                      <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">
                        <i class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                
               --}}
            {{-- </div> --}}
          </div>
        </div>
      </div>

    </div>
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
</body>

</html>

{{-- @endsection --}}