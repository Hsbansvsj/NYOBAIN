<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NYOBAIN Blog | @yield('title')</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- ADMINLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
        }

        /* NAVBAR */
        .main-header {
            border-bottom: 1px solid #ebedf2 !important;
        }

        /* SIDEBAR */
        .main-sidebar {
            background-color: #0f172a !important;
        }

        .brand-link {
            border-bottom: 1px solid #334155 !important;
            padding: 1.5rem 0.5rem !important;
        }

        .nav-sidebar .nav-link {
            border-radius: 12px;
            margin-bottom: 6px;
            padding: 10px 15px;
            color: #94a3b8;
            transition: 0.3s;
        }

        .nav-sidebar .nav-link:hover {
            background-color: #334155;
            color: #fff;
        }

        .nav-sidebar .nav-link.active {
            background-color: #3b82f6 !important;
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(59,130,246,0.3);
        }

        .content-wrapper {
            background-color: #f8fafc;
        }

        .main-footer {
            background: #fff;
            border-top: 1px solid #ebedf2;
            color: #64748b;
        }

        .custom-alert {
            border-radius: 12px;
            border: none;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link font-weight-bold">Lihat Website</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">

            @auth
            <li class="nav-item dropdown">
                <a class="nav-link d-flex align-items-center" data-toggle="dropdown">
                    
                    <div class="mr-3 text-right d-none d-md-block">
                        <p class="mb-0 small font-weight-bold">
                            {{ Auth::user()->name }}
                        </p>
                        <small class="text-muted">Admin</small>
                    </div>

                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff" 
                         class="img-circle elevation-1" width="35">
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow border-0" style="border-radius: 12px;">
                    
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profil
                    </a>

                    <div class="dropdown-divider"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>

                </div>
            </li>
            @else
            <li class="nav-item">
                <a href="/login" class="btn btn-primary btn-sm">Login</a>
            </li>
            @endauth

        </ul>
    </nav>

    <!-- SIDEBAR -->
    <aside class="main-sidebar elevation-4">

        <!-- BRAND -->
        <a href="/dashboard" class="brand-link text-center">
            <span class="brand-text font-weight-bold text-white">
                <i class="fas fa-blog mr-2 text-primary"></i>
                NYOBAIN<span class="text-primary">BLOG</span>
            </span>
        </a>

        <!-- MENU -->
        <div class="sidebar px-3">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column">

                    <li class="nav-header small text-muted text-uppercase">Menu</li>

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/posts" class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>Artikel</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/categories" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>Kategori</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- CONTENT -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-4">

                @if(session('success'))
                <div class="alert alert-success custom-alert alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                @endif

                @yield('content')

            </div>
        </section>
    </div>

    <!-- FOOTER -->
    <footer class="main-footer text-center">
        <strong>© {{ date('Y') }} NYOBAIN Blog</strong>
    </footer>

</div>

<!-- SCRIPT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>