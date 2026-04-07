<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama_kategori'];

    // Relasi ke Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}