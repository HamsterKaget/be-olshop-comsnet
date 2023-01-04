<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css"/>
        <title>@yield('title')</title>

        {{-- Style --}}
        @stack('prepend-style')
        @include('includes.style')
        @stack('addon-style')
    </head>

    <body>
        <div class="page-dashboard">
            <div class="d-flex" id="wrapper" data-aos="fade-right">
                <!-- Sidebar -->
                <div class="border-right" id="sidebar-wrapper">
                    <div class="sidebar-heading text-center">
                        <a href="{{ route('home') }}" class="navbar-brand">
                            <img src="{{ url('/images/logo.svg') }}" alt="logo" class="my-4" />
                        </a>
                    </div>
                    <div class="list-group list-group-flush pl-4">
                        <a href="{{ route('admin-dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('admin') ? 'active' : '') }}" "> Dashboard </a>
                        <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/category*') ? 'active' : '') }}"> Category </a>
                        <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product*') ? 'active' : '') }} "> Product </a>
                        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action"> Transactions </a>
                        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/user*') ? 'active' : '') }}"> Users </a>
                        <a href="/" class="list-group-item list-group-item-action"> Sign Out </a>
                    </div>
                </div>

                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                        <div class="container-fluid">
                            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">&laquo; Menu</button>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSuppotedContent">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSuppotedContent">
                                <!-- Dekstop Menu -->
                                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                            <img src="{{ url('/images/user_pc.png') }}" alt="user pic" class="rounded-circle mr-2 profile-picture" />
                                            Hi, Hamster
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="/dashboard.html" class="dropdown-item">Dashboard</a>
                                            <a href="/dashboard-account.html" class="dropdown-item">Settings</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="/" class="dropdown-item">Logout</a>
                                        </div>
                                    </li>
                                </ul>

                                <ul class="navbar-nav d-block d-lg-none">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"> Hi, Hamster </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link d-inline-block"> Cart </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    {{-- Content --}}
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        @stack('prepend-script')
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        @stack('addon-script')
    </body>
</html>
