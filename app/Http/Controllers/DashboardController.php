<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        $totalPost = Post::count();
        $totalKategori = Category::count();
        $totalUser = User::count();

        $posts = Post::with('category')
                    ->latest()
                    ->take(5)
                    ->get();

        return view('dashboard', compact(
            'totalPost',
            'totalKategori',
            'totalUser',
            'posts'
        ));
    }
}