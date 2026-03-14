@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <a href="{{ route('posts.index') }}" class="btn btn-light rounded-pill px-4 mb-4 shadow-sm fw-bold">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>

            <div class="card border-0 shadow-sm" style="border-radius: 25px; overflow: hidden;">
                @if($post->gambar)
                    <img src="{{ asset('uploads/'.$post->gambar) }}" class="img-fluid w-100" style="max-height: 450px; object-fit: cover;">
                @endif
                
                <div class="card-body p-5">
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge badge-pill badge-primary px-3 py-2 mr-3" style="background-color: #007bff;">
                            {{ $post->category->nama_kategori ?? 'Umum' }}
                        </span>
                        <span class="text-muted small">
                            <i class="far fa-calendar-alt mr-1"></i> {{ $post->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <h1 class="fw-bold mb-4" style="color: #2d3436; font-size: 2.5rem; letter-spacing: -1px;">
                        {{ $post->judul }}
                    </h1>
                    
                    <hr class="my-4" style="opacity: 0.1;">

                    <div class="article-content text-secondary" style="line-height: 1.9; font-size: 1.15rem;">
                        {!! nl2br(e($post->isi)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection