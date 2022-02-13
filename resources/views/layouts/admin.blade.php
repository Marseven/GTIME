<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G-Time - Espace Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('styles')

    <link rel="shortcut icon" href="{{ asset('images/logo/ico-gt.jpg') }}" type="image/x-icon">

    @php
        $user = Auth::user();
    @endphp

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ route('admin') }}"><img style="height: 2em;"
                                    src="{{ asset('images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('admin') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Tableau de Bord</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-sticky"></i>
                                <span>Gestion des Tickets</span>
                                @php
                                    $today = date('Y-m-d');
                                @endphp
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ url('admin/agent/') }}">Traitement</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('admin/list-tickets/' . $today) }}">Tickets</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('admin/list-notes/' . $today) }}">Notes</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('admin/') }}">Rapports</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-building"></i>
                                <span>Gestion des Entités</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item">
                                    <a href="{{ url('admin/list-structures') }}">Structures</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ url('admin/list-services') }}">Services</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Gestion des utilisateurs</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item ">
                                    <a href="{{ url('admin/list-users') }}">Listes</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('admin/security-object/') }}">Objets</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ url('admin/security-role/') }}">Rôles</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ url('admin/security-permission/') }}">Permissions</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    @php
                                        $user->load(['SecurityRole']);
                                    @endphp
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"> {{ $user->name }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{ $user->SecurityRole->name }}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img
                                                    src="{{ asset($user->picture ? $user->picture : 'images/faces/1.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ $user->name }}!</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('admin-profil') }}"><i
                                                class="icon-mid bi bi-person me-2"></i>
                                            Mon
                                            Profil</a></li>

                                    <li><a class="dropdown-item" href="{{ route('home') }}"><i
                                                class="icon-mid bi bi-house me-2"></i>
                                            Aller sur le Site</a></li>

                                    <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <button class="btn" type="submit"><i
                                                    class="icon-mid bi bi-box-arrow-left me-2"></i></i>Déconnexion</button>

                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    @include('layouts.flash-admin')

                    @yield('content')
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2022 &copy; G-Time</p>
                        </div>
                        <div class="float-end">
                            <p>Coder avec <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                Par <a href=#">Codeur X</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
