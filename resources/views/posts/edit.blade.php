@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0" style="color: #2d3436; letter-spacing: -1px;">
                Edit <span class="text-primary">Artikel</span>
            </h2>
            <p class="text-muted mb-0">Perbarui informasi artikel blog kamu di sini.</p>
        </div>
        <a href="{{ route('posts.index') }}" class="btn btn-light rounded-pill px-4 shadow-sm fw-bold">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
                <div class="card-body p-5">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-4">
                            <label class="form-label fw-bold text-dark">
                                <i class="fas fa-heading text-primary mr-1"></i> Judul Artikel
                            </label>
                            <input type="text" 
                                   name="judul" 
                                   class="form-control form-control-lg @error('judul') is-invalid @enderror" 
                                   value="{{ old('judul', $post->judul) }}" 
                                   placeholder="Masukkan judul artikel"
                                   style="border-radius: 12px; background-color: #f8f9fa; border: 1px solid #e9ecef;">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-dark">
                                    <i class="fas fa-th-large text-primary mr-1"></i> Kategori
                                </label>
                                <select name="category_id" 
                                        class="form-control form-control-lg @error('category_id') is-invalid @enderror"
                                        style="border-radius: 12px; background-color: #f8f9fa; border: 1px solid #e9ecef;">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-dark">
                                    <i class="fas fa-image text-primary mr-1"></i> Ganti Gambar (Opsional)
                                </label>
                                <input type="file" 
                                       name="gambar" 
                                       class="form-control @error('gambar') is-invalid @enderror" 
                                       accept="image/*" 
                                       onchange="previewImage(event)"
                                       style="border-radius: 12px;">
                                @error('gambar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <small class="text-muted d-block mt-1">Kosongkan jika tidak ingin mengganti gambar.</small>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 text-center">
                                <p class="small fw-bold text-muted mb-2">Gambar Saat Ini:</p>
                                @if($post->gambar)
                                    <img src="{{ asset('uploads/'.$post->gambar) }}" 
                                         class="shadow-sm border"
                                         style="max-width: 100%; height: 200px; object-fit: cover; border-radius: 15px;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px; border-radius: 15px;">
                                        <span class="text-muted italic">Tidak ada gambar</span>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 text-center" id="previewContainer" style="display:none;">
                                <p class="small fw-bold text-primary mb-2">Pratinjau Gambar Baru:</p>
                                <img id="preview" 
                                     class="shadow-sm border"
                                     style="max-width: 100%; height: 200px; object-fit: cover; border-radius: 15px;">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label fw-bold text-dark">
                                <i class="fas fa-align-left text-primary mr-1"></i> Isi Konten
                            </label>
                            <textarea name="isi" 
                                      rows="10" 
                                      class="form-control @error('isi') is-invalid @enderror" 
                                      placeholder="Perbarui isi artikel di sini..."
                                      style="border-radius: 12px; background-color: #f8f9fa; border: 1px solid #e9ecef;">{{ old('isi', $post->isi) }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">
                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ route('posts.index') }}" class="btn btn-light px-4 rounded-pill mr-2">Batal</a>
                            <button type="submit" class="btn btn-warning px-5 rounded-pill shadow-sm fw-bold text-white">
                                <i class="fas fa-sync-alt mr-2"></i> Update Artikel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1);
        border-color: #007bff;
        background-color: #fff;
    }
    .fw-bold { font-weight: 800 !important; }
    .text-primary { color: #007bff !important; }
    .btn-warning { background-color: #f39c12; border: none; }
    .btn-warning:hover { background-color: #e67e22; }
    
    input[type=file]::file-selector-button {
        background: #007bff;
        color: white;
        border: none;
        padding: 5px 15px;
        border-radius: 10px;
        margin-right: 10px;
        cursor: pointer;
        transition: 0.3s;
    }
</style>

<script>
function previewImage(event){
    const file = event.target.files[0];
    if(!file) return;

    const reader = new FileReader();
    reader.onload = function(e){
        const preview = document.getElementById('preview');
        const container = document.getElementById('previewContainer');
        
        preview.src = e.target.result;
        container.style.display = "block";
    };
    reader.readAsDataURL(file);
}
</script>
@endsection