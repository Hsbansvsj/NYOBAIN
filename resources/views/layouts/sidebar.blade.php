<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1e293b !important;">
    
    <a href="/dashboard" class="brand-link text-center border-0 mt-3">
        <span class="brand-text font-weight-bold text-white">
            <i class="fas fa-utensils mr-2 text-primary"></i> NYOBAIN<span class="text-primary">BLOG</span>
        </span>
    </a>

    <div class="sidebar px-3">
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                
                <li class="nav-header small text-muted text-uppercase mb-2" style="letter-spacing: 1px;">
                    MENU UTAMA
                </li>
                
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} py-3 mb-2" style="border-radius: 12px;">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p class="ml-2">Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/posts" class="nav-link {{ Request::is('posts*') ? 'active' : '' }} py-3 mb-2" style="border-radius: 12px;">
                        <i class="nav-icon fas fa-pen-nib"></i>
                        <p class="ml-2">Artikel Blog</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/categories" class="nav-link {{ Request::is('categories*') ? 'active' : '' }} py-3 mb-2" style="border-radius: 12px;">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p class="ml-2">Kategori</p>
                    </a>
                </li>

                </ul>
        </nav>
    </div>
</aside>