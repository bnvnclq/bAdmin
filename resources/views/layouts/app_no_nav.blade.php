{{-- 
/*
 * File: app_no_nav.blade.php
 * Project: bAdmin
 * File Created: Sunday, 11th August 2019 9:38:22 am
 * Author: Bien Laqui (bienlaqui@couplesforchristglobal.org)
 * -----
 * Last Modified: Sunday, 11th August 2019 10:03:24 am
 * Modified By: Bien Laqui (bienlaqui@couplesforchristglobal.org>)
 * -----
 * Copyright 2018 - 2019 Couples For Christ Global Mission Foundation Inc.
 * -----
 * Description: 
 */
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

    <title>{{ config('app.name', 'bAdmin') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet">
    
</head>
<body>
    <div class="wrapper ">
        <div class="main-panel main-panel-no-sidebar">
            <div class="content py-4">
                @yield('content')
            </div>
            <footer class="footer footer-sticky footer-black  footer-white ">
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
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
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
    
</body>
</html>
 