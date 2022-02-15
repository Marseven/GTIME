<!DOCTYPE html>

<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>G-Time - Gestion de File D'attente</title>
    <meta name="description" content="Home" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    @stack('styles')
    <!--end::Page Vendors Styles-->

    <!-- FAVICON FILES -->
    <link rel="shortcut icon" href="{{ asset('images/logo/ico-gt.jpg') }}" type="image/x-icon">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/color.css') }}">
</head>

<body>
    <div id="dtr-wrapper" class="clearfix">

        <!-- preloader starts -->
        <div class="dtr-preloader" style="display: none;">
            <div class="dtr-preloader-inner">
                <div class="dtr-loader">Chargement...</div>
            </div>
        </div>
        <!-- preloader ends -->

        <!-- Small Devices Header
============================================= -->
        <div class="dtr-responsive-header header-with-slick-menu fixed-top on-scroll" style="">
            <div class="container">

                <!-- small devices logo -->
                <div class="dtr-responsive-header-left"> <a class="dtr-logo" href="{{ route('home') }}"><img
                            src="{{ asset('front/img/logo-dark.png') }}" alt="logo"></a> </div>
                <!-- small devices logo ends -->

                <!-- menu button -->
                <button id="dtr-menu-button" class="dtr-hamburger" type="button"><span
                        class="dtr-hamburger-lines-wrapper"><span class="dtr-hamburger-lines"></span></span></button>
            </div>
            <div class="dtr-responsive-header-menu">
                <div class="slicknav_menu">
                    <ul class="slicknav_nav slicknav_hidden" style="touch-action: pan-y; display: none;"
                        aria-hidden="true" role="menu">
                        <li> <a class="nav-link" href=#home" role="menuitem" tabindex="-1">Accueil</a> </li>
                        <li> <a class="nav-link" href="#services" role="menuitem" tabindex="-1">Services</a> </li>
                        <li> <a class="nav-link" href="#contact" role="menuitem" tabindex="-1">Contact</a> </li>
                        @if (Auth::user())
                            <li> <a class="nav-link" href="{{ route('admin') }}">Administration</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- Small Devices Header ends
============================================= -->

        <!-- header starts
============================================= -->
        <header id="dtr-header-global" class="fixed-top on-scroll">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">

                    <!-- header left starts -->
                    <div class="dtr-header-left">

                        <!-- logo -->
                        <a class="logo-default dtr-scroll-link" href="#home"><img
                                src="{{ asset('front/img/logo-dark.png') }}" alt="logo"></a>

                        <!-- logo on scroll -->
                        <a class="logo-alt dtr-scroll-link" href="#home"><img
                                src="{{ asset('front/img/logo-dark.png') }}" alt="logo"></a>
                        <!-- logo on scroll ends -->

                    </div>
                    <!-- header left ends -->

                    <!-- menu starts-->
                    <div class="main-navigation">
                        <ul class="sf-menu dtr-nav dark-nav-on-load dark-nav-on-scroll dtr-menu-dark sf-js-enabled sf-arrows"
                            style="touch-action: pan-y;">
                            <li> <a class="nav-link" href="#home">Accueil</a></li>
                            <li> <a class="nav-link" href="#services">Services</a> </li>
                            <li> <a class="nav-link" href="#contact">Contact</a> </li>
                            @if (Auth::user())
                                <li> <a class="nav-link" href="{{ route('admin') }}">Administration</a> </li>
                            @endif
                        </ul>
                    </div>
                    <!-- menu ends -->

                </div>
            </div>
        </header>
        <!-- header ends
================================================== -->

        <!-- == main content area starts == -->
        <div id="dtr-main-content">

            @include('layouts.flash-admin')

            @yield('content')

        </div>
        <!-- == main content area ends == -->

        <!-- footer section starts
================================================== -->
        <footer id="dtr-footer">
            <!--== copyright row starts ==-->
            <div class="dtr-copyright">
                <div class="container">
                    <div class="row">

                        <!--== column 1 starts ==-->
                        <div class="col-12 col-md-6">

                            <!-- social starts -->
                            <ul class="dtr-social dtr-social-list">
                                <li><a href="#" class="dtr-twitter" target="_blank" title="twitter"></a></li>
                                <li><a href="#" class="dtr-facebook" target="_blank" title="facebook"></a></li>
                                <li><a href="#" class="dtr-linkedin" target="_blank" title="linkedin"></a></li>
                            </ul>
                            <!-- social ends -->

                        </div>
                        <!--== column 1 ends ==-->

                        <!--== column 2 starts ==-->
                        <div class="col-12 col-md-6 text-end small-device-space">
                            <p>© 2022 G-Time. Tous Droits Réservés</p>
                        </div>
                        <!--== column 2 ends ==-->

                    </div>
                </div>
            </div>
            <!--== copyright row ends ==-->

        </footer>
        <!-- footer section ends
================================================== -->
        <!-- take top arrow -->
        <a id="take-to-top" href="#" class="dtr-fade-scroll " style="display: inline;"></a>
    </div>
    <!-- #dtr-wrapper ends -->

    <!-- JS FILES -->
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/plugins.js') }}"></script>
    <script src="{{ asset('front/js/slick.min.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>

    <!--begin::Page Scripts(used by this page)-->
    @stack('scripts')
    <!--end::Page Scripts-->

    <span
        style="border-radius: 10px !important; text-indent: 12px !important; width: auto !important; height: 20px !important; padding: 0px 8px !important; text-align: center !important; vertical-align: middle !important; font: bold 11px / 20px &quot;Helvetica Neue&quot;, Helvetica, sans-serif !important; color: rgb(255, 255, 255) !important; background: url(&quot;data:image/svg+xml;base64,PHN2ZyBpZD0ic291cmNlIiB3aWR0aD0iMTIiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxMiAxMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iNiIgY3k9IjYiIHI9IjYiIGZpbGw9IiNFNjAwMjMiPjwvY2lyY2xlPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTAgNkMwIDguNTYxNSAxLjYwNTUgMTAuNzQ4NSAzLjg2NSAxMS42MDlDMy44MSAxMS4xNDA1IDMuNzUxNSAxMC4zNjggMy44Nzc1IDkuODI2QzMuOTg2IDkuMzYgNC41NzggNi44NTcgNC41NzggNi44NTdDNC41NzggNi44NTcgNC4zOTk1IDYuNDk5NSA0LjM5OTUgNS45N0M0LjM5OTUgNS4xNCA0Ljg4MDUgNC41MiA1LjQ4IDQuNTJDNS45OSA0LjUyIDYuMjM2IDQuOTAyNSA2LjIzNiA1LjM2MUM2LjIzNiA1Ljg3MzUgNS45MDk1IDYuNjM5NSA1Ljc0MSA3LjM1QzUuNjAwNSA3Ljk0NDUgNi4wMzk1IDguNDI5NSA2LjYyNTUgOC40Mjk1QzcuNjg3IDguNDI5NSA4LjUwMzUgNy4zMSA4LjUwMzUgNS42OTRDOC41MDM1IDQuMjYzNSA3LjQ3NTUgMy4yNjQgNi4wMDggMy4yNjRDNC4zMDkgMy4yNjQgMy4zMTE1IDQuNTM4NSAzLjMxMTUgNS44NTZDMy4zMTE1IDYuMzY5NSAzLjUwOSA2LjkxOTUgMy43NTYgNy4yMTlDMy44MDQ1IDcuMjc4NSAzLjgxMiA3LjMzIDMuNzk3NSA3LjM5MDVDMy43NTIgNy41Nzk1IDMuNjUxIDcuOTg1IDMuNjMxNSA4LjA2OEMzLjYwNSA4LjE3NyAzLjU0NSA4LjIwMDUgMy40MzE1IDguMTQ3NUMyLjY4NTUgNy44MDA1IDIuMjE5NSA2LjcxIDIuMjE5NSA1LjgzNEMyLjIxOTUgMy45NDk1IDMuNTg4IDIuMjE5NSA2LjE2NTUgMi4yMTk1QzguMjM3NSAyLjIxOTUgOS44NDggMy42OTYgOS44NDggNS42NjlDOS44NDggNy43Mjc1IDguNTUwNSA5LjM4NDUgNi43NDg1IDkuMzg0NUM2LjE0MyA5LjM4NDUgNS41NzQ1IDkuMDY5NSA1LjM3OTUgOC42OThDNS4zNzk1IDguNjk4IDUuMDggOS44MzkgNS4wMDc1IDEwLjExOEM0Ljg2NjUgMTAuNjYgNC40NzU1IDExLjM0NiA0LjIzMyAxMS43MzU1QzQuNzkyIDExLjkwNzUgNS4zODUgMTIgNiAxMkM5LjMxMzUgMTIgMTIgOS4zMTM1IDEyIDZDMTIgMi42ODY1IDkuMzEzNSAwIDYgMEMyLjY4NjUgMCAwIDIuNjg2NSAwIDZaIiBmaWxsPSJ3aGl0ZSI+PC9wYXRoPgo8L3N2Zz4=&quot;) 4px 50% / 12px 12px no-repeat rgb(230, 0, 35) !important; position: absolute !important; opacity: 1 !important; z-index: 8675309 !important; display: none; cursor: pointer !important; border: none !important; -webkit-font-smoothing: antialiased !important; top: 6009px; left: 322px;">Save</span><span
        style="border-radius: 12px; width: 24px !important; height: 24px !important; background: url(&quot;data:image/svg+xml;base64,PHN2ZyBpZD0ic291cmNlIiB3aWR0aD0iMjIiIGhlaWdodD0iMjIiIHZpZXdCb3g9IjAgMCAyMiAyMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMTEiIGN5PSIxMSIgcj0iMTEiIGZpbGw9ImJsYWNrIiBmaWxsLW9wYWNpdHk9IjAuOCI+PC9jaXJjbGU+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTUuMDgzNCA0LjU4MzMzSDEzLjMzMzRWNS43NDk5OUgxNS4wODM0QzE1LjcyNjggNS43NDk5OSAxNi4yNSA2LjI3MzI0IDE2LjI1IDYuOTE2NjZWOC42NjY2NkgxNy40MTY3VjYuOTE2NjZDMTcuNDE2NyA1LjYyOTgzIDE2LjM3MDIgNC41ODMzMyAxNS4wODM0IDQuNTgzMzNaTTE2LjI1IDE1LjA4MzNDMTYuMjUgMTUuNzI2NyAxNS43MjY4IDE2LjI1IDE1LjA4MzQgMTYuMjVIMTMuMzMzNFYxNy40MTY3SDE1LjA4MzRDMTYuMzcwMiAxNy40MTY3IDE3LjQxNjcgMTYuMzcwMiAxNy40MTY3IDE1LjA4MzNWMTMuMzMzM0gxNi4yNVYxNS4wODMzWk01Ljc1MDA0IDE1LjA4MzNWMTMuMzMzM0g0LjU4MzM3VjE1LjA4MzNDNC41ODMzNyAxNi4zNzAyIDUuNjI5ODcgMTcuNDE2NyA2LjkxNjcxIDE3LjQxNjdIOC42NjY3MVYxNi4yNUg2LjkxNjcxQzYuMjczMjkgMTYuMjUgNS43NTAwNCAxNS43MjY3IDUuNzUwMDQgMTUuMDgzM1pNNS43NTAwNCA2LjkxNjY2QzUuNzUwMDQgNi4yNzMyNCA2LjI3MzI5IDUuNzQ5OTkgNi45MTY3MSA1Ljc0OTk5SDguNjY2NzFWNC41ODMzM0g2LjkxNjcxQzUuNjI5ODcgNC41ODMzMyA0LjU4MzM3IDUuNjI5ODMgNC41ODMzNyA2LjkxNjY2VjguNjY2NjZINS43NTAwNFY2LjkxNjY2Wk05LjI1MDA0IDEwLjcwODNDOS4yNTAwNCA5LjkwNDQ5IDkuOTA0NTQgOS4yNDk5OSAxMC43MDg0IDkuMjQ5OTlDMTEuNTEyMiA5LjI0OTk5IDEyLjE2NjcgOS45MDQ0OSAxMi4xNjY3IDEwLjcwODNDMTIuMTY2NyAxMS41MTIyIDExLjUxMjIgMTIuMTY2NyAxMC43MDg0IDEyLjE2NjdDOS45MDQ1NCAxMi4xNjY3IDkuMjUwMDQgMTEuNTEyMiA5LjI1MDA0IDEwLjcwODNaTTEzLjYyNSAxNC41QzEzLjg0OSAxNC41IDE0LjA3MyAxNC40MTQ4IDE0LjI0NCAxNC4yNDM5QzE0LjU4NTIgMTMuOTAyMSAxNC41ODUyIDEzLjM0NzkgMTQuMjQ0IDEzLjAwNjFMMTMuMDcwMyAxMS44MzNDMTMuMjM0MiAxMS40OTA2IDEzLjMzMzQgMTEuMTEyNiAxMy4zMzM0IDEwLjcwODNDMTMuMzMzNCA5LjI2MTA4IDEyLjE1NTYgOC4wODMzMyAxMC43MDg0IDguMDgzMzNDOS4yNjExMiA4LjA4MzMzIDguMDgzMzcgOS4yNjEwOCA4LjA4MzM3IDEwLjcwODNDOC4wODMzNyAxMi4xNTU2IDkuMjYxMTIgMTMuMzMzMyAxMC43MDg0IDEzLjMzMzNDMTEuMTEyNiAxMy4zMzMzIDExLjQ5MDYgMTMuMjM0MiAxMS44MzMgMTMuMDcwMkwxMy4wMDYxIDE0LjI0MzlDMTMuMTc3IDE0LjQxNDggMTMuNDAxIDE0LjUgMTMuNjI1IDE0LjVaIiBmaWxsPSJ3aGl0ZSI+PC9wYXRoPgo8L3N2Zz4=&quot;) 50% 50% / 24px 24px no-repeat rgba(0, 0, 0, 0.4) !important; position: absolute !important; opacity: 1 !important; z-index: 8675309 !important; display: none; cursor: pointer !important; border: none !important; top: 6009px; left: 756px;"></span>
</body>

</html>
