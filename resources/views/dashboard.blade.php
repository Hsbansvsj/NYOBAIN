@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-5">
        <h2 class="fw-bold" style="color: #2d3436; letter-spacing: -1px;">
            Dashboard <span class="text-primary">Overview</span>
        </h2>
        <p class="text-muted">Ringkasan performa dan aktivitas blog kamu hari ini.</p>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box-modern bg-light-primary text-primary mr-3">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 text-uppercase small fw-bold" style="letter-spacing: 1px;">Total Post</p>
                            <h2 class="fw-bold mb-0" style="color: #2d3436;">{{ $totalPost ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box-modern bg-light-success text-success mr-3">
                            <i class="fas fa-tags fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 text-uppercase small fw-bold" style="letter-spacing: 1px;">Total Kategori</p>
                            <h2 class="fw-bold mb-0" style="color: #2d3436;">{{ $totalKategori ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box-modern bg-light-warning text-warning mr-3">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 text-uppercase small fw-bold" style="letter-spacing: 1px;">Total User</p>
                            <h2 class="fw-bold mb-0" style="color: #2d3436;">{{ $totalUser ?? 1 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mt-3 modern-table-card">
        <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold m-0" style="color: #2d3436;">
                <i class="fas fa-history mr-2 text-primary"></i> Post Terbaru
            </h5>
            <a href="{{ route('posts.index') }}" class="btn btn-light btn-sm rounded-pill px-3 fw-bold">Lihat Semua</a>
        </div>
        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="text-muted small text-uppercase">
                        <tr>
                            <th class="border-top-0">Judul Artikel</th>
                            <th class="border-top-0">Kategori</th>
                            <th class="border-top-0">Tanggal Rilis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts ?? [] as $post)
                        <tr>
                            <td class="font-weight-bold text-dark">{{ $post->judul }}</td>
                            <td>
                                <span class="badge badge-pill badge-light-primary px-3 py-2">
                                    {{ $post->category->nama_kategori ?? '-' }}
                                </span>
                            </td>
                            <td class="text-muted">
                                <i class="far fa-calendar-alt mr-1"></i> {{ $post->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-light d-block mb-3"></i>
                                <span class="text-muted">Belum ada post yang tersedia</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling Kartu Statistik */
    .stat-card {
        border-radius: 20px !important;
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08) !important;
    }

    /* Modern Table Card */
    .modern-table-card {
        border-radius: 20px !important;
    }

    /* Icon Box Modern */
    .icon-box-modern {
        width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
    }

    /* Background Soft Colors */
    .bg-light-primary { background-color: #e7f1ff; }
    .bg-light-success { background-color: #eafff0; }
    .bg-light-warning { background-color: #fff9e6; }
    
    .badge-light-primary {
        background-color: #f0f7ff;
        color: #007bff;
        font-weight: 700;
    }

    /* Utility */
    .fw-bold { font-weight: 800 !important; }
    .text-primary { color: #007bff !important; }
    .table thead th { border-bottom: none; }
    .table td { vertical-align: middle; padding: 1.2rem 0.75rem; }
</style>
@endsection