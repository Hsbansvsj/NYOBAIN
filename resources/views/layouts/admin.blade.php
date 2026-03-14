<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NYOBAIN Blog | Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        /* Perbaikan Tipografi & Style Global */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
        }

        /* Navbar Modern */
        .main-header {
            border-bottom: 1px solid #ebedf2 !important;
            padding: 0.5rem 1rem;
        }

        /* Sidebar Modern */
        .main-sidebar {
            background-color: #1e293b !important; /* Biru Gelap Navy (Lebih Pro) */
            box-shadow: 4px 0 10px rgba(0,0,0,0.05) !important;
        }
        
        .brand-link {
            border-bottom: 1px solid #334155 !important;
            padding: 1.5rem 0.5rem !important;
        }

        .nav-sidebar .nav-item .nav-link {
            border-radius: 12px;
            margin-bottom: 5px;
            padding: 10px 15px;
            transition: 0.3s;
            color: #94a3b8;
        }

        .nav-sidebar .nav-item .nav-link.active {
            background-color: #3b82f6 !important; /* Warna Biru Modern */
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .nav-sidebar .nav-item .nav-link:hover:not(.active) {
            background-color: #334155;
            color: #fff;
        }

        /* Content Area */
        .content-wrapper {
            background-color: #f8fafc;
        }

        /* Footer */
        .main-footer {
            background: #fff;
            border-top: 1px solid #ebedf2;
            color: #64748b;
            padding: 1.5rem;
        }

        /* Sweet Alert Mockup Style untuk Session Flash */
        .custom-alert {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link font-weight-bold">Lihat Website</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">
                    <div class="text-right d-none d-md-block mr-3">
                        <p class="mb-0 small font-weight-bold text-dark">{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p class="mb-0 x-small text-muted" style="font-size: 10px;">Super Admin</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=3b82f6&color=fff" 
                         class="img-circle elevation-1" width="35" alt="User Image">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-0 shadow-lg" style="border-radius: 15px;">
                    <div class="px-3 py-3 text-center bg-light" style="border-radius: 15px 15px 0 0;">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=3b82f6&color=fff" 
                             class="img-circle mb-2" width="60">
                        <p class="mb-0 font-weight-bold">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <small class="text-muted">{{ Auth::user()->email ?? 'admin@blog.com' }}</small>
                    </div>
                    <div class="dropdown-divider m-0"></div>
                    <a href="#" class="dropdown-item py-3">
                        <i class="fas fa-user-cog mr-2 text-muted"></i> Pengaturan Profil
                    </a>
                    <div class="dropdown-divider m-0"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item py-3 text-danger font-weight-bold">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar Aplikasi
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar elevation-4">
        <a href="/dashboard" class="brand-link text-center mt-2">
            <span class="brand-text font-weight-bolder text-white" style="letter-spacing: 1px; font-size: 1.2rem;">
                <i class="fas fa-utensils mr-2"></i> NYOBAIN<span class="text-primary">BLOG</span>
            </span>
        </a>

        <div class="sidebar px-3">
            <nav class="mt-4">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-header small text-muted text-uppercase mb-2" style="letter-spacing: 1px;">Menu Utama</li>
                    
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th-large"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/posts" class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-pen-nib"></i>
                            <p>Artikel Blog</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/categories" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>Kategori</p>
                        </a>
                    </li>

                    <li class="nav-header small text-muted text-uppercase mt-4 mb-2" style="letter-spacing: 1px;">Sistem</li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Manajemen User</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-4">
                
                @if(session('success'))
                <div class="alert alert-success custom-alert alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @yield('content')
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 2.0.0
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="#" class="text-primary">NYOBAIN Blog</a>.</strong> All rights reserved.
    </footer>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>