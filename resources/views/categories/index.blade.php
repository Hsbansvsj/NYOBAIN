@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0" style="color: #2d3436; letter-spacing: -1px;">
                Daftar <span class="text-primary">Kategori Blog</span>
            </h2>
            <p class="text-muted mb-0">Kelola dan kelompokkan konten artikel kamu.</p>
        </div>
        <a href="{{ url('/categories/create') }}" class="btn btn-primary shadow-sm px-4 rounded-pill fw-bold">
            <i class="fas fa-plus-circle mr-2"></i> Tambah Kategori
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 12px;">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
    </div>
    @endif

    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th class="ps-4 py-3" width="100">No</th>
                            <th class="py-3">Nama Kategori</th>
                            <th class="py-3 text-center" width="250">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td class="ps-4">
                                <span class="badge badge-pill badge-light text-dark border px-3 py-2">
                                    {{ $loop->iteration }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="icon-box-small bg-light-primary text-primary mr-3">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    <span class="fw-bold" style="color: #2d3436; font-size: 1.1rem;">
                                        {{ $category->nama_kategori }}
                                    </span>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ url('/categories/'.$category->id.'/edit') }}" 
                                       class="btn btn-sm btn-light rounded-pill px-3 fw-bold text-warning shadow-sm border">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    
                                    <form action="{{ url('/categories/'.$category->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-light rounded-pill px-3 fw-bold text-danger shadow-sm border" 
                                                onclick="return confirm('Hapus kategori ini?')">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <div class="py-4">
                                    <i class="fas fa-folder-open fa-4x text-light mb-3"></i>
                                    <h5 class="text-muted">Belum ada kategori yang tersedia</h5>
                                    <p class="small text-secondary">Silakan tambahkan kategori baru terlebih dahulu.</p>
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
    /* Styling agar identik dengan Dashboard & Daftar Post */
    .text-primary { color: #3b82f6 !important; }
    .btn-primary { background-color: #3b82f6; border: none; }
    .btn-primary:hover { background-color: #2563eb; }
    
    /* Box Ikon Kecil */
    .icon-box-small {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
    }
    .bg-light-primary { background-color: #eff6ff; }
    
    .table thead th {
        border-top: none;
        border-bottom: 1px solid #f1f5f9;
        letter-spacing: 0.5px;
    }
    
    .table td {
        padding: 1.1rem 0.75rem;
        border-color: #f1f5f9;
    }

    .fw-bold { font-weight: 700 !important; }
    
    .table tbody tr:hover {
        background-color: #f8fafc;
    }

    /* Penyesuaian Tombol Soft */
    .btn-light {
        background-color: #fff;
        border: 1px solid #e9ecef;
    }
    .btn-light:hover {
        background-color: #f8fafc;
    }
</style>
@endsection