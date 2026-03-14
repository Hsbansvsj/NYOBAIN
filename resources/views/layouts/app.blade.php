<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NYOBAIN Blog | Modern Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #3b82f6;
            --dark-navy: #0f172a;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #1e293b;
            overflow-x: hidden;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e2e8f0;
            z-index: 1050;
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
            color: var(--dark-navy) !important;
        }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--dark-navy);
            padding-top: 80px; /* Space for navbar */
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1040;
        }

        .sidebar.hide {
            transform: translateX(-100%);
        }

        .sidebar a {
            display: flex;
            align-items: center;
            color: #94a3b8;
            padding: 12px 25px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: 0.2s;
            margin: 4px 15px;
            border-radius: 10px;
        }

        .sidebar a i {
            font-size: 1.2rem;
            margin-right: 12px;
        }

        .sidebar a:hover, .sidebar a.active {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .sidebar a.active {
            background: var(--primary-color);
            color: #fff;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        /* CONTENT */
        .content {
            margin-left: var(--sidebar-width);
            padding: 100px 30px 40px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 100vh;
        }

        .content.full {
            margin-left: 0;
        }

        /* CUSTOM CARD */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        /* DROPDOWN */
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 10px;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 8px 15px;
        }

        /* TOGGLE BUTTON */
        #toggleSidebar {
            border-radius: 10px;
            background: #f1f5f9;
            border: none;
            color: var(--dark-navy);
            transition: 0.2s;
        }

        #toggleSidebar:hover {
            background: #e2e8f0;
        }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .content { margin-left: 0; }
            .sidebar.show-mobile { transform: translateX(0); }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <button class="btn me-3" id="toggleSidebar">
                <i class="bi bi-text-indent-left fs-4"></i>
            </button>

            <a class="navbar-brand d-flex align-items-center" href="/">
                <div class="bg-primary text-white p-2 rounded-3 me-2 d-flex">
                    <i class="bi bi-journal-text fs-5"></i>
                </div>
                NYOBAIN<span class="text-primary">BLOG</span>
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center fw-semibold text-dark" href="#" data-bs-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3b82f6&color=fff" 
                                 class="rounded-circle me-2" width="32" height="32">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0">
                            <li><a class="dropdown-item" href="/profile"><i class="bi bi-person me-2"></i> Akun Saya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger fw-bold">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="/login" class="btn btn-outline-primary rounded-pill px-4">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar shadow-lg" id="sidebar">
        <div class="px-4 mb-4">
            <small class="text-uppercase fw-bold text-muted" style="font-size: 10px; letter-spacing: 1px;">Menu Utama</small>
        </div>
        
        <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i> Dashboard
        </a>

        <a href="/posts" class="{{ Request::is('posts*') ? 'active' : '' }}">
            <i class="bi bi-newspaper"></i> Artikel Blog
        </a>

        @auth
        <a href="/categories" class="{{ Request::is('categories*') ? 'active' : '' }}">
            <i class="bi bi-tags"></i> Kategori
        </a>
        <a href="/users" class="{{ Request::is('users*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Manajemen User
        </a>
        @endauth
    </div>

    <div class="content" id="content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px;">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById("sidebar");
        const content = document.getElementById("content");
        const toggle = document.getElementById("toggleSidebar");

        toggle.addEventListener("click", function(){
            if(window.innerWidth > 992) {
                sidebar.classList.toggle("hide");
                content.classList.toggle("full");
            } else {
                sidebar.classList.toggle("show-mobile");
            }
        });

        // Auto active sidebar link (optional improvement)
        // Handled by Laravel Request::is above
    </script>
</body>
</html>