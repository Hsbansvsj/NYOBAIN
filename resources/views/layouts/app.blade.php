<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NYOBAIN Blog | Dashboard</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- BOOTSTRAP -->
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

        .navbar {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e2e8f0;
            z-index: 1050;
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--dark-navy) !important;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--dark-navy);
            padding-top: 80px;
            transition: 0.3s;
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
            margin: 4px 15px;
            border-radius: 10px;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover, .sidebar a.active {
            background: var(--primary-color);
            color: #fff;
        }

        .content {
            margin-left: var(--sidebar-width);
            padding: 100px 30px;
            transition: 0.3s;
        }

        .content.full {
            margin-left: 0;
        }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .content { margin-left: 0; }
            .sidebar.show-mobile { transform: translateX(0); }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <button class="btn me-3" id="toggleSidebar">
            <i class="bi bi-list fs-4"></i>
        </button>

        <a class="navbar-brand" href="/">NYOBAIN BLOG</a>

        <div class="ms-auto">
            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
            @else
            <a href="/login" class="btn btn-primary btn-sm">Login</a>
            @endauth
        </div>
    </div>
</nav>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">

    <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <a href="/posts" class="{{ Request::is('posts*') ? 'active' : '' }}">
        <i class="bi bi-journal-text"></i> Artikel
    </a>

    <a href="/categories" class="{{ Request::is('categories*') ? 'active' : '' }}">
        <i class="bi bi-tags"></i> Kategori
    </a>

</div>

<!-- CONTENT -->
<div class="content" id="content">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

<!-- SCRIPT -->
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
</script>

</body>
</html>