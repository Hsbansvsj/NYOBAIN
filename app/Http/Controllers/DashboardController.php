<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung data statistik yang hanya ditampilkan di blade
        $totalPost = Post::count();
        $totalKategori = Category::count();

        // Mengambil 5 postingan artikel terbaru beserta relasi kategorinya
        $posts = Post::with('category')
                    ->latest()
                    ->take(5)
                    ->get();

        // Mengirimkan variabel yang dibutuhkan saja
        return view('dashboard', compact(
            'totalPost',
            'totalKategori',
            'posts'
        ));
    }
}