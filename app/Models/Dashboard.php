<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Category;

class Dashboard
{
    public static function getStats()
    {
        return [
            'totalPost' => Post::count(),
            'totalKategori' => Category::count(),
            'postTerbaru' => Post::latest()->take(5)->get()
        ];
    }
}