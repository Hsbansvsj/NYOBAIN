<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     * Menambahkan 'gambar' di sini sangat krusial agar upload lewat browser berhasil.
     */
    protected $fillable = [
        'judul', 
        'isi', 
        'category_id', 
        'user_id', 
        'gambar'
    ];

    /**
     * Relasi ke model Category.
     * Satu artikel memiliki satu kategori.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi ke model User.
     * Satu artikel ditulis oleh satu user/admin.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Aksesor untuk mempermudah pemanggilan URL gambar di Blade.
     * Gunakan: $post->image_url
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->gambar && file_exists(public_path('uploads/' . $this->gambar))) {
            return asset('uploads/' . $this->gambar);
        }
        return asset('images/no-image.png'); // Sediakan gambar default jika kosong
    }
}