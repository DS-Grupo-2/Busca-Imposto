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
    <link rel="stylesheet" href="{{ asset('assetslogged/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assetslogged/css/argon.css?v=1.2.0') }}" type="text/css">
</head>
<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
      <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
          <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
          </a>
        </div>
        <div class="navbar-inner">
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
            <ul class="navbar-nav">
              {{-- <li class="nav-item">
                <a class="nav-link" href="dashboard.html">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user-info') }}">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Usuário</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Categorias</span>
                </a>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('subcategories-view') }}">
                    <i class="ni ni-tv-2 text-primary"></i>
                    <span class="nav-link-text">SubCategorias</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('products-view') }}">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Produtos</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/system/saved-products') }}">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Produtos Salvos</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/system/get-bests') }}">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">The bests</span>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('logged-test') }}">
                  <i class="ni ni-tv-2 text-primary"></i>
                  <span class="nav-link-text">Teste</span>
                </a>
              </li> --}}
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->

            <!-- Navigation -->

          </div>
        </div>
      </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
      <!-- Topnav -->
      <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->

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

            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                      <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:34px; height:34px; position:relativa; top:10px; left:10px; border-radius:50%">
                    </span>
                    <div class="media-body  ml-2  d-none d-lg-block">
                        @guest
                            @else
                            <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                        @endguest
                    </div>
                  </div>
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
      </nav>
      <!-- Header -->
      <!-- Header -->
      <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0"><?php echo (isset($page['title']) ? $page['title'] : '') ?></h6>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
                @include('flash-message')
                @yield('content')

              <!-- Card footer -->
              <div class="card-footer py-4">
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
            </div>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <footer class="footer pt-0">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6">
              <div class="copyright text-center  text-lg-left  text-muted">
                &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                </li>
              </ul>
            </div>
          </div>
        </footer>
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
