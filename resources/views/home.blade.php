<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="NYOBAINblog Template">
    <meta name="keywords" content="NYOBAINblog, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NYOBAINblog | Home</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Unna:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&family=Montserrat:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <style>
        /* Modernized Top Header */
        .header {
            background: #ffffff;
            border-bottom: 1px solid #f1f1f1;
            padding: 15px 0 0 0;
        }

        /* CUSTOM TEXT LOGO STYLING */
        .header__logo {
            margin-top: -5px;
        }
        
        .brand-logo-text {
            font-size: 32px;
            text-decoration: none !important;
            display: inline-block;
            letter-spacing: -0.5px;
        }
        .brand-logo-text .text-highlight {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            color: #ca4e34;
            font-weight: 700;
            margin-right: -2px;
        }
        .brand-logo-text .text-main {
            font-family: 'Nunito Sans', sans-serif;
            color: #111111;
            font-weight: 800;
        }

        /* Ultimate Button Styling (DASHBOARD & LOGIN MODERN) */
        .header__btn .btn-auth-modern {
            font-family: 'Nunito Sans', sans-serif;
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-weight: 700;
            padding: 10px 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .header__btn .btn-login-style {
            color: #111111;
            background-color: transparent;
            border: 2px solid #111111;
        }
        .header__btn .btn-login-style:hover {
            background-color: #ca4e34;
            border-color: #ca4e34;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(202, 78, 52, 0.2);
        }

        .header__btn .btn-dashboard-style {
            color: #ffffff;
            background-color: #111111;
            border: 2px solid #111111;
        }
        .header__btn .btn-dashboard-style:hover {
            background-color: #ca4e34;
            border-color: #ca4e34;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(202, 78, 52, 0.2);
        }

        /* Clean & Sleek Navigation Options Area */
        .nav-options {
            background: #fafafa;
            padding: 8px 0;
            border-bottom: 1px solid #eaeaea;
        }

        /* Professional Menu Links Interaction */
        .header__menu ul li {
            position: relative;
            margin: 0 20px;
        }
        .header__menu ul li a {
            font-size: 13px;
            font-weight: 700;
            color: #555555;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: color 0.3s ease;
            padding-bottom: 4px;
            display: inline-block;
        }
        
        .header__menu ul li > a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #ca4e34;
            transition: width 0.3s ease;
        }
        .header__menu ul li:hover > a::after,
        .header__menu ul li.active > a::after {
            width: 100%;
        }
        .header__menu ul li:hover > a,
        .header__menu ul li.active > a {
            color: #ca4e34 !important;
        }

        /* DROPDOWN KATEGORI DESKTOP FIX */
        .header__menu ul li .dropdown {
            position: absolute;
            left: 50%;
            top: 100%;
            width: 220px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 10px 0;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            border-radius: 6px;
            border: 1px solid #eee;
            transform: translateX(-50%) translateY(15px);
            transition: all 0.3s ease;
        }
        .header__menu ul li:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(5px);
        }
        .header__menu ul li .dropdown li {
            width: 100%;
            margin: 0;
            text-align: left;
            display: block;
        }
        .header__menu ul li .dropdown li a {
            padding: 10px 20px;
            color: #666666 !important;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            width: 100%;
            display: block;
            transition: all 0.2s ease;
        }
        .header__menu ul li .dropdown li a:hover {
            color: #ca4e34 !important;
            background: #f9f9f9;
            padding-left: 24px;
        }
        .header__menu ul li .dropdown li a::after {
            display: none !important;
        }

        /* Hover Cards Artikel */
        .blog__item {
            border: 1px solid #f2f2f2; 
            border-radius: 8px; 
            overflow: hidden; 
            height: 100%; 
            display: flex; 
            flex-direction: column; 
            background: #fff; 
            transition: all 0.3s ease;
        }
        .blog__item:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.07);
        }
        .blog__item:hover .blog__item__text h5 a {
            color: #ca4e34 !important;
        }

        /* Social Icons Accent */
        .header__social a {
            color: #888888;
            margin-left: 18px;
            transition: color 0.3s;
        }
        .header__social a:hover {
            color: #ca4e34;
        }
    </style>
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ url('/') }}" class="brand-logo-text" style="font-size: 26px;">
                <span class="text-highlight">Nyobain</span><span class="text-main">blog</span>
            </a>
        </div>
        
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li>
                    <a href="#">Categories</a>
                    <ul class="dropdown">
                        @foreach($categories ?? [] as $cat)
                            <li>
                                <a href="{{ Route::has('kategori') ? route('kategori', $cat->id) : '#' }}">
                                    {{ $cat->nama_kategori }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ Route::has('about') ? route('about') : '#' }}">About</a></li>
                <li><a href="{{ Route::has('contact') ? route('contact') : '#' }}">Contact</a></li>
                
                @auth
                    <li><a href="{{ Route::has('dashboard') ? route('dashboard') : '#' }}" class="text-success fw-bold"><i class="fas fa-th-large mr-1"></i> Dashboard</a></li>
                @else
                    <li><a href="{{ Route::has('login') ? route('login') : '#' }}" class="text-primary fw-bold"><i class="fas fa-sign-in-alt mr-1"></i> Login</a></li>
                @endauth
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
    
    <header class="header">
        <div class="container-fluid">
            <div class="row align-items-center">
                
                <div class="col-lg-3 col-md-3">
                    <div class="header__btn pl-3">
                        @auth
                            <a href="{{ Route::has('dashboard') ? route('dashboard') : '#' }}" class="btn-auth-modern btn-dashboard-style">
                                <i class="fas fa-th-large mr-2"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ Route::has('login') ? route('login') : '#' }}" class="btn-auth-modern btn-login-style">
                                <i class="fas fa-sign-in-alt mr-2"></i> Login
                            </a>
                        @endauth
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <div class="header__logo text-center">
                        <a href="{{ url('/') }}" class="brand-logo-text">
                            <span class="text-highlight">Nyobain</span><span class="text-main">blog</span>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3">
                    <div class="header__social text-right pr-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="far fa-envelope"></i></a>
                    </div>
                </div>

            </div>
            
            <div class="nav-options mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="header__menu text-center">
                                <ul class="d-flex justify-content-center align-items-center m-0 p-0" style="list-style: none;">
                                    
                                    <li class="active">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>

                                    <li>
                                        <a href="#">Categories <i class="fa fa-angle-down" style="font-size: 11px; margin-left: 2px;"></i></a>
                                        <ul class="dropdown">
                                            @foreach($categories ?? [] as $cat)
                                                <li>
                                                    <a href="{{ Route::has('kategori') ? route('kategori', $cat->id) : '#' }}">
                                                        {{ $cat->nama_kategori }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li><a href="{{ Route::has('about') ? route('about') : '#' }}">About</a></li>
                                    <li><a href="{{ Route::has('contact') ? route('contact') : '#' }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <section class="blog-section spad" style="padding-top: 60px; padding-bottom: 60px; background-color: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 style="font-family: 'Playfair Display', serif; font-style: italic; font-weight: 700; color: #111;">Latest Articles</h2>
                    <div style="width: 50px; height: 2px; background-color: #ca4e34; margin: 15px auto 0;"></div>
                </div>
            </div>

            <div class="row">
                @forelse($posts ?? [] as $post)
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="blog__item">
                            
                            <div class="blog__item__pic" style="height: 220px; overflow: hidden; position: relative;">
                                @if($post->gambar)
                                    <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('img/blog/blog-default.jpg') }}" alt="Default Image" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                                
                                @if($post->category)
                                    <span style="position: absolute; top: 15px; left: 15px; background: #ca4e34; color: #fff; font-size: 11px; font-weight: 700; text-transform: uppercase; padding: 4px 12px; border-radius: 20px; letter-spacing: 0.5px;">
                                        {{ $post->category->nama_kategori }}
                                    </span>
                                @endif
                            </div>

                            <div class="blog__item__text" style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                <div>
                                    <ul style="list-style: none; padding: 0; margin-bottom: 12px; display: flex; gap: 15px; font-size: 12px; color: #88px;">
                                        <li><i class="far fa-calendar" style="color: #ca4e34; margin-right: 5px;"></i> {{ $post->created_at->format('M d, Y') }}</li>
                                        <li><i class="far fa-user" style="color: #ca4e34; margin-right: 5px;"></i> {{ $post->user->name ?? 'Admin' }}</li>
                                    </ul>
                                    <h5 style="margin-bottom: 15px;">
                                        <a href="{{ Route::has('artikel.show') ? route('artikel.show', $post->id) : '#' }}" style="font-family: 'Nunito Sans', sans-serif; font-weight: 700; color: #111; font-size: 18px; text-decoration: none; line-height: 1.4; transition: color 0.3s;">
                                            {{ Str::limit($post->judul, 55, '...') }}
                                        </a>
                                    </h5>
                                    <p style="font-size: 14px; color: #666; line-height: 1.6; margin-bottom: 20px;">
                                        {{ Str::limit(strip_tags($post->isi), 100, '...') }}
                                    </p>
                                </div>
                                
                                <div style="border-top: 1px solid #f2f2f2; padding-top: 15px;">
                                    <a href="{{ Route::has('artikel.show') ? route('artikel.show', $post->id) : '#' }}" style="font-size: 12px; font-weight: 700; text-transform: uppercase; color: #ca4e34; letter-spacing: 1px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                                        Read More <i class="fa fa-angle-right" style="font-size: 14px; font-weight: bold;"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 text-center py-5">
                        <p class="text-muted" style="font-size: 16px; font-style: italic;">Belum ada artikel yang diterbitkan.</p>
                    </div>
                @endforelse
            </div>

            {{-- Validasi Pagination Links --}}
            @if(isset($posts) && method_exists($posts, 'links'))
                <div class="row mt-4">
                    <div class="col-lg-12 d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            @endif

        </div>
    </section>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>