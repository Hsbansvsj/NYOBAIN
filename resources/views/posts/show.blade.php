@extends('layouts.admin')

@section('title', 'Detail Artikel')

@section('content')

<div class="container py-5">

    <!-- BACK -->
    <div class="mb-4">
        <a href="{{ route('posts.index') }}" 
           class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- ================= ARTIKEL ================= -->
            <article class="article-wrapper mb-5">

                @if($post->gambar)
                <div class="article-image text-center mb-4">
                    <img src="{{ asset('uploads/'.$post->gambar) }}" 
                         class="img-fluid shadow-sm">
                </div>
                @endif

                <!-- META -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge badge-category">
                        <i class="fas fa-folder-open mr-1"></i>
                        {{ $post->category->nama_kategori ?? 'Umum' }}
                    </span>

                    <small class="text-muted">
                        <i class="far fa-calendar-alt mr-1"></i>
                        {{ $post->created_at->format('d M Y') }}
                    </small>
                </div>

                <!-- TITLE -->
                <h1 class="article-title mb-3">
                    {{ $post->judul }}
                </h1>

                <hr>

                <!-- CONTENT -->
                <div class="article-content">
                    {!! nl2br(e($post->isi)) !!}
                </div>

            </article>


            <!-- ================= KOMENTAR ================= -->
            <section class="comment-section">

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">

                        <!-- ALERT -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fas fa-check-circle mr-1"></i>
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif

                        <!-- TITLE -->
                        <h5 class="mb-4 comment-title">
                            <i class="fas fa-comments mr-2"></i>
                            {{ $post->comments->count() }} Komentar
                        </h5>

                        <!-- LIST KOMENTAR -->
                        @forelse ($post->comments as $comment)
                            <div class="comment-item mb-3">

                                <div class="comment-box d-flex">

                                    <!-- AVATAR -->
                                    <div class="avatar mr-3">
                                        {{ strtoupper(substr($comment->nama, 0, 1)) }}
                                    </div>

                                    <!-- CONTENT -->
                                    <div class="flex-grow-1">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <strong class="comment-name">{{ $comment->nama }}</strong>
                                            <small class="text-muted">
                                                <i class="far fa-clock mr-1"></i>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </small>
                                        </div>

                                        <p class="comment-text mt-2 mb-0">
                                            {{ $comment->komentar }}
                                        </p>

                                    </div>

                                </div>

                            </div>
                        @empty
                            <div class="text-center text-muted py-4">
                                <i class="fas fa-comments fa-2x mb-2"></i>
                                <p>Belum ada komentar</p>
                            </div>
                        @endforelse

                        <hr>

                        <!-- FORM -->
                        <h6 class="mb-3">
                            <i class="fas fa-pen mr-1"></i> Tulis Komentar
                        </h6>

                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">

                            <div class="form-group">
                                <input type="text" name="nama" 
                                       class="form-control rounded-pill shadow-sm" 
                                       placeholder="Nama Anda" required>
                            </div>

                            <div class="form-group">
                                <textarea name="komentar" rows="3" 
                                          class="form-control shadow-sm" 
                                          placeholder="Tulis komentar..." required></textarea>
                            </div>

                            <button class="btn btn-primary rounded-pill px-4">
                                <i class="fas fa-paper-plane mr-1"></i> Kirim
                            </button>
                        </form>

                    </div>
                </div>

            </section>

        </div>
    </div>
</div>


<style>

/* ARTICLE */
.article-wrapper {
    background: #fff;
}

/* IMAGE (FIX TERLALU BESAR) */
.article-image img {
    max-height: 260px;
    width: auto;
    border-radius: 12px;
}

/* TITLE */
.article-title {
    font-size: 1.9rem;
    font-weight: 700;
    color: #0f172a;
}

/* CONTENT */
.article-content {
    font-size: 1.05rem;
    line-height: 1.9;
    color: #475569;
}

/* CATEGORY */
.badge-category {
    background: #e0f2fe;
    color: #0284c7;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 0.75rem;
}

/* KOMENTAR */
.comment-title {
    font-weight: 600;
}

/* COMMENT BOX */
.comment-box {
    background: #ffffff;
    padding: 14px 16px;
    border-radius: 14px;
    border: 1px solid #e5e7eb;
    width: 100%;
    transition: 0.2s;
}

.comment-box:hover {
    border-color: #3b82f6;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

/* TEXT */
.comment-name {
    font-size: 0.95rem;
}

.comment-text {
    font-size: 0.95rem;
    color: #475569;
    line-height: 1.6;
}

/* AVATAR */
.avatar {
    width: 38px;
    height: 38px;
    font-size: 0.9rem;
    background: linear-gradient(135deg, #3b82f6, #6366f1);
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .article-title {
        font-size: 1.5rem;
    }

    .article-image img {
        max-height: 200px;
    }
}

</style>

@endsection