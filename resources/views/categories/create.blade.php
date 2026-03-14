@extends('layouts.admin') {{-- Menggunakan layout admin agar sidebar & navbar sinkron --}}

@section('title', 'Tambah Kategori')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0" style="color: #2d3436; letter-spacing: -1px;">
                Tambah <span class="text-primary">Kategori Baru</span>
            </h2>
            <p class="text-muted mb-0">Buat kategori baru untuk mengelompokkan artikel blog kamu.</p>
        </div>
        <a href="{{ url('/categories') }}" class="btn btn-light shadow-sm px-4 rounded-pill fw-bold text-muted">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-body p-5">
                    <form action="{{ url('/categories') }}" method="POST">
                        @csrf

                        <div class="mb-5">
                            <label class="form-label fw-bold mb-3" style="color: #2d3436; font-size: 1.1rem;">
                                <i class="fas fa-tag text-primary mr-2"></i> Nama Kategori
                            </label>
                            <input 
                                type="text"
                                name="nama_kategori"
                                class="form-control form-control-lg border-0 shadow-sm @error('nama_kategori') is-invalid @enderror"
                                placeholder="Misal: Kuliner Nusantara, Teknologi, dll"
                                value="{{ old('nama_kategori') }}"
                                style="background-color: #f8fafc; border-radius: 12px; padding: 15px 20px;"
                            >
                            @error('nama_kategori')
                            <div class="invalid-feedback ml-2">
                                {{ $message }}
                            </div>
                            @enderror
                            <small class="text-muted d-block mt-3">
                                <i class="fas fa-info-circle mr-1"></i> Gunakan nama yang singkat dan deskriptif.
                            </small>
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary shadow px-5 py-3 rounded-pill fw-bold">
                                <i class="fas fa-save mr-2"></i> Simpan Kategori
                            </button>
                            <a href="{{ url('/categories') }}" class="btn btn-light px-4 py-3 rounded-pill fw-bold">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm bg-primary text-white" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3"><i class="fas fa-lightbulb mr-2 text-warning"></i> Tips Singkat</h5>
                    <p class="small opacity-75">
                        Kategori membantu pembaca menemukan konten yang mereka cari lebih cepat. Pastikan nama kategori tidak terlalu panjang.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling agar identik dengan desain blog sebelumnya */
    .text-primary { color: #3b82f6 !important; }
    .btn-primary { background-color: #3b82f6; border: none; transition: all 0.3s; }
    .btn-primary:hover { background-color: #2563eb; transform: translateY(-2px); box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2); }
    
    .form-control:focus {
        background-color: #fff !important;
        border: 1px solid #3b82f6 !important;
        box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.1) !important;
    }

    .fw-bold { font-weight: 700 !important; }
    .rounded-pill { border-radius: 50px !important; }
</style>
@endsection