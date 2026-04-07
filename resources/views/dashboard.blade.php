@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="mb-5">
        <h2 class="fw-bold" style="color: #2d3436; letter-spacing: -1px;">
            Dashboard <span class="text-primary">Overview</span>
        </h2>
        <p class="text-muted">Ringkasan performa dan aktivitas blog kamu.</p>
    </div>

    <!-- STAT CARD -->
    <div class="row">

        <!-- TOTAL POST -->
        <div class="col-md-6 mb-4">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box-modern bg-light-primary text-primary me-3">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 text-uppercase small fw-bold">Total Post</p>
                            <h2 class="fw-bold mb-0">{{ $totalPost ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOTAL KATEGORI -->
        <div class="col-md-6 mb-4">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box-modern bg-light-success text-success me-3">
                            <i class="fas fa-tags fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 text-uppercase small fw-bold">Total Kategori</p>
                            <h2 class="fw-bold mb-0">{{ $totalKategori ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLE POST TERBARU -->
    <div class="card border-0 shadow-sm mt-3 modern-table-card">
        <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold m-0">
                <i class="fas fa-history me-2 text-primary"></i> Post Terbaru
            </h5>
            <a href="{{ route('posts.index') }}" class="btn btn-light btn-sm rounded-pill px-3 fw-bold">
                Lihat Semua
            </a>
        </div>

        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="text-muted small text-uppercase">
                        <tr>
                            <th>Judul Artikel</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($posts ?? [] as $post)
                        <tr>
                            <td class="fw-bold text-dark">
                                {{ $post->judul ?? '-' }}
                            </td>

                            <td>
                                <span class="badge badge-light-primary px-3 py-2">
                                    {{ $post->category->nama_kategori ?? 'Tidak ada' }}
                                </span>
                            </td>

                            <td class="text-muted">
                                {{ $post->created_at ? $post->created_at->format('d M Y') : '-' }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-light d-block mb-3"></i>
                                <span class="text-muted">Belum ada post</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

<!-- STYLE -->
<style>
.stat-card {
    border-radius: 20px !important;
    transition: 0.3s;
}
.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.08) !important;
}

.modern-table-card {
    border-radius: 20px !important;
}

.icon-box-modern {
    width: 65px;
    height: 65px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
}

.bg-light-primary { background-color: #e7f1ff; }
.bg-light-success { background-color: #eafff0; }

.badge-light-primary {
    background-color: #f0f7ff;
    color: #007bff;
    font-weight: 700;
}

.fw-bold { font-weight: 800 !important; }
.table td { vertical-align: middle; padding: 1.2rem 0.75rem; }
</style>

@endsection