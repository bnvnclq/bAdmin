{{-- 
=========================================================
    Paper Dashboard 2 - v2.0.0
=========================================================

    Product Page: https://www.creative-tim.com/product/paper-dashboard-2
    Copyright 2019 Creative Tim (https://www.creative-tim.com)
    Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

    Coded by Creative Tim

=========================================================
 --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'bAdmin') }} - @yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
    <!-- JQuery -->
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    
</head>
<body>
    <div class="wrapper ">
        @guest
        @else
            <div class="sidebar" data-color="white" data-active-color="danger">
              {{-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" --}}
            <div class="logo">
              <a href="http://www.bienlaqui.tk" class="simple-text logo-mini">
                <div class="logo-image-small">
                  <img src="../assets/img/logo-small.png">
                </div>
              </a>
              <a href="http://www.bienlaqui.tk" class="simple-text logo-normal">
                {{ config('app.name', 'bAdmin') }}
                <!-- <div class="logo-image-big">
                  <img src="../assets/img/logo-big.png">
                </div> -->
              </a>
            </div>
            <div class="sidebar-wrapper">
              <ul class="nav">
                <li class="active nav_links" id="nav_dashboard">
                  <a href="{{ route('home') }}">
                    <i class="fa fa-th-large"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                @foreach ($coll_modules as $module)
                  <li class="nav_links" id="{{ 'nav_'.$module->code }}">
                    <a href="{{ route($module->route_name) }}" title="{{ $module->description }}">
                      <i class="{{$module->icon_class}}"></i>
                      <p>{{ $module->name }}</p>
                    </a>
                  </li>
                @endforeach          
              </ul>
            </div>
          </div>
        @endguest
        <div class="main-panel">
          @guest
          @else
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
              <div class="container-fluid">
                <div class="navbar-wrapper">
                  <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                    </button>
                  </div>
                  <a class="navbar-brand" href="#">@yield('title')</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-bar navbar-kebab"></span>
                  <span class="navbar-toggler-bar navbar-kebab"></span>
                  <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                  <form>
                    <div class="input-group no-border">
                      <input type="text" value="" class="form-control" placeholder="Search...">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="nc-icon nc-zoom-split"></i>
                        </div>
                      </div>
                    </div>
                  </form>
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link btn-magnify" href="#pablo">
                        <i class="nc-icon nc-layout-11"></i>
                        <p>
                          <span class="d-lg-none d-md-block">Stats</span>
                        </p>
                      </a>
                    </li>
                    <li class="nav-item btn-rotate dropdown">
                      <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                        <p>
                          <span class="d-lg-none d-md-block">Some Actions</span>
                        </p>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Change Password</a>
                      </div>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <a class="nav-link btn-magnify" href="javascript:void(0);" onclick="$(this).closest('form').submit();">
                          
                        <i class="fa fa-power-off"></i>
                        <p>
                          <span class="d-lg-none d-md-block">Logout</span>
                        </p>
                      </a>
                    </form>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!-- End Navbar -->
          @endguest
          <div class="content p-1">
            @if (session('message'))
                <div class="alert alert-primary" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
          </div>
          <footer class="footer footer-black  footer-white ">
            <div class="container-fluid">
              <div class="row">
                <nav class="footer-nav">
                  <ul>
                    <li>
                      <a href="https://github.com/bnvnclq/bAdmin" target="_blank">bAdmin on Github</a>
                    </li>
                    <li>
                      <a href="http://bienlaqui-blog.tk/" target="_blank">Blog</a>
                    </li>
                    <li>
                      <a href="http://bienlaqui.tk/" target="_blank">About me</a>
                    </li>
                  </ul>
                </nav>
                <div class="credits ml-auto">
                  <span class="copyright">
                    ©
                    <script>
                      document.write(new Date().getFullYear())
                    </script>, modified by Bien Laqui
                  </span>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    <!--   Core JS Files   -->
    <script>
      // ARRAY of module variables
      @if (isset($coll_modules) && $coll_modules != [])
          var arr_modules = {!! $coll_modules->where('parent_id', null)->pluck('code')->toJson() !!};
      @endif
    </script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>
    
    <script src="{{ asset('js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
