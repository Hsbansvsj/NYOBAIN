<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'user_id', // optional (kalau pakai login)
        'nama',
        'komentar'
    ];

    /*
    |--------------------------------------------------------------------------
    | CASTING
    |--------------------------------------------------------------------------
    */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    // Relasi ke Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relasi ke User (optional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR (BIAR ENAK DI VIEW)
    |--------------------------------------------------------------------------
    */

    // Nama pengomentar (kalau login pakai user, kalau tidak pakai nama)
    public function getNamaLengkapAttribute()
    {
        return $this->user->name ?? $this->nama ?? 'Anonymous';
    }

    // Format tanggal
    public function getTanggalAttribute()
    {
        return $this->created_at->format('d M Y H:i');
    }

    // Potong komentar (preview)
    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->komentar), 100);
    }
}