@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-5">
        <h2 class="fw-bold" style="color: #362d35; letter-spacing: -1px;">
            Dashboard <span class="text-primary">Overview</span>
        </h2>
        <p class="text-muted">Ringkasan performa dan aktivitas blog kamu.</p>
    </div>

    <div class="row">

        <div class="col-md-6 mb-4">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box-modern bg-light-primary text-primary me-3">
                            <i class="fas fa-file-alt fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 text-uppercase small fw-bold" style="letter-spacing: 0.5px;">Total Post</p>
                            <h2 class="fw-bold mb-0 text-dark">{{ $totalPost }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon-box-modern bg-light-success text-success me-3">
                            <i class="fas fa-tags fa-2x"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 text-uppercase small fw-bold" style="letter-spacing: 0.5px;">Total Kategori</p>
                            <h2 class="fw-bold mb-0 text-dark">{{ $totalKategori }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card border-0 shadow-sm mt-3 modern-table-card">
        <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold m-0 text-dark">
                <i class="fas fa-history me-2 text-primary"></i> Post Terbaru
            </h5>
            <a href="{{ route('posts.index') }}" class="btn btn-light btn-sm rounded-pill px-3 fw-bold shadow-sm">
                Lihat Semua
            </a>
        </div>

        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="text-muted small text-uppercase" style="letter-spacing: 0.5px;">
                        <tr>
                            <th class="border-0">Judul Artikel</th>
                            <th class="border-0">Kategori</th>
                            <th class="border-0">Tanggal Pembuatan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($posts as $post)
                        <tr>
                            <td class="fw-bold text-dark" style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $post->judul }}
                            </td>

                            <td>
                                <span class="badge badge-light-primary px-3 py-2 rounded-pill">
                                    {{ $post->category->nama_kategori ?? 'Tanpa Kategori' }}
                                </span>
                            </td>

                            <td class="text-muted small">
                                {{ $post->created_at->translatedFormat('d M Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <div class="py-3">
                                    <i class="fas fa-inbox fa-3x text-muted opacity-30 d-block mb-3"></i>
                                    <span class="text-muted fw-medium">Belum ada postingan yang dibuat</span>
                                </div>
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
.stat-card {
    border-radius: 20px !important;
    transition: all 0.3s ease;
}
.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.08) !important;
}

.modern-table-card {
    border-radius: 20px !important;
    overflow: hidden;
}

.icon-box-modern {
    width: 65px;
    height: 65px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
}

.bg-light-primary { background-color: #e7f1ff !important; }
.bg-light-success { background-color: #eafff0 !important; }

.badge-light-primary {
    background-color: #f0f7ff !important;
    color: #007bff !important;
    font-weight: 700;
}

.fw-bold { font-weight: 700 !important; }
.table td { vertical-align: middle; padding: 1.2rem 0.75rem; border-bottom: 1px solid #f8f9fa; }
.table th { background-color: #fafdff; padding: 1rem 0.75rem; }
.opacity-30 { opacity: 0.3; }
</style>
@endsection