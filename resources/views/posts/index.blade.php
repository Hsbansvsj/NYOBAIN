@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>
            <h2 class="fw-bold m-0" style="color: #2d3436; letter-spacing: -1px;">
                Daftar <span class="text-primary">Artikel Blog</span>
            </h2>

            <p class="text-muted mb-0">
                Kelola konten dan publikasi artikel kamu.
            </p>
        </div>

        <a href="{{ route('posts.create') }}"
           class="btn btn-primary shadow-sm px-4 rounded-pill fw-bold">

            <i class="fas fa-plus-circle mr-2"></i>
            Tambah Artikel

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-pill mb-4 px-4">

            <i class="fas fa-check-circle mr-2"></i>

            {{ session('success') }}

        </div>

    @endif

    @if($posts->count() > 0)

        <div class="row">

            @foreach($posts as $post)

            <div class="col-12 mb-4">

                <div class="card border-0 shadow-sm modern-blog-card">

                    <div class="row no-gutters">

                        <div class="col-md-4 position-relative">

                            @if($post->gambar)

                                <img src="{{ asset('uploads/'.$post->gambar) }}"
                                     class="card-img-modern"
                                     alt="{{ $post->judul }}">

                            @else

                                <div class="no-image-placeholder">
                                    <i class="fas fa-image fa-3x text-white-50"></i>
                                </div>

                            @endif

                            <div class="category-floating-badge">
                                {{ $post->category->nama_kategori ?? 'Umum' }}
                            </div>

                            {{-- STATUS BADGE --}}
                            <div class="status-floating-badge">

                                @if($post->status == 'published')

                                    <span class="badge badge-published">
                                        Published
                                    </span>

                                @else

                                    <span class="badge badge-draft">
                                        Draft
                                    </span>

                                @endif

                            </div>

                        </div>

                        <div class="col-md-8">

                            <div class="card-body p-4 d-flex flex-column h-100">

                                <div class="d-flex align-items-center mb-2 text-muted small uppercase">

                                    <span class="mr-3">
                                        <i class="far fa-user mr-1 text-primary"></i>
                                        {{ $post->user->name ?? 'Admin' }}
                                    </span>

                                    <span>
                                        <i class="far fa-calendar-alt mr-1 text-primary"></i>
                                        {{ $post->created_at->format('d M Y') }}
                                    </span>

                                </div>

                                <h4 class="fw-bold mb-3" style="color: #2d3436;">
                                    {{ $post->judul }}
                                </h4>

                                <p class="text-secondary mb-4">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($post->isi), 180) }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center mt-auto">

                                    <div class="action-buttons">

                                        <a href="{{ route('posts.edit', $post->id) }}"
                                           class="btn btn-light-warning btn-sm mr-2 px-3 rounded-pill">

                                            <i class="fas fa-edit mr-1"></i>
                                            Edit

                                        </a>

                                        <form action="{{ route('posts.destroy', $post->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-light-danger btn-sm px-3 rounded-pill"
                                                    onclick="return confirm('Hapus artikel ini?')">

                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                    <a href="{{ route('posts.show', $post->id) }}"
                                       class="btn btn-link btn-sm font-weight-bold text-primary text-decoration-none">

                                        Selengkapnya
                                        <i class="fas fa-arrow-right ml-1"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        <div class="mt-4">
            {{ $posts->links() ?? '' }}
        </div>

    @else

        <div class="card border-0 shadow-sm rounded-lg py-5 text-center"
             style="border-radius: 20px !important;">

            <div class="card-body">

                <i class="fas fa-folder-open fa-4x text-light mb-3"></i>

                <h4 class="text-muted fw-bold">
                    Belum ada artikel yang dibuat
                </h4>

                <p class="text-muted">
                    Mulailah menulis artikel pertama kamu hari ini.
                </p>

                <a href="{{ route('posts.create') }}"
                   class="btn btn-primary mt-3 px-5 py-2 rounded-pill shadow-sm fw-bold">

                    Mulai Menulis

                </a>

            </div>

        </div>

    @endif

</div>

<style>

    /* Card Styles */
    .modern-blog-card{
        border-radius: 20px !important;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
    }

    .modern-blog-card:hover{
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }

    /* Image Styles */
    .card-img-modern{
        width: 100%;
        height: 100%;
        min-height: 250px;
        object-fit: cover;
    }

    .no-image-placeholder{
        width: 100%;
        height: 100%;
        min-height: 250px;
        background: #dee2e6;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Category Badge */
    .category-floating-badge{
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(255,255,255,0.95);
        color: #007bff;
        padding: 6px 15px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        backdrop-filter: blur(4px);
    }

    /* STATUS BADGE */
    .status-floating-badge{
        position: absolute;
        bottom: 20px;
        left: 20px;
    }

    .badge-published{
        background: #28a745;
        color: white;
        padding: 8px 14px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .badge-draft{
        background: #ffc107;
        color: #212529;
        padding: 8px 14px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    /* Custom Buttons */
    .btn-light-warning{
        background-color: #fff9db;
        color: #f08c00;
        border: none;
        font-weight: 600;
    }

    .btn-light-warning:hover{
        background-color: #f08c00;
        color: white;
    }

    .btn-light-danger{
        background-color: #fff5f5;
        color: #fa5252;
        border: none;
        font-weight: 600;
    }

    .btn-light-danger:hover{
        background-color: #fa5252;
        color: white;
    }

    /* Typography & Utilities */
    .fw-bold{
        font-weight: 800 !important;
    }

    .text-primary{
        color: #007bff !important;
    }

    .btn-primary{
        background-color: #007bff;
        border: none;
        transition: 0.3s;
    }

    .btn-primary:hover{
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .no-gutters{
        margin-right: 0;
        margin-left: 0;
    }

    .no-gutters > [class*="col-"]{
        padding-right: 0;
        padding-left: 0;
    }

</style>
@endsection