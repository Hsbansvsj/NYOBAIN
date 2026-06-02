<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'user'])->where('status', 'publish')->latest()->paginate(6);
        return view('home', compact('posts'));
    }

    public function show(Post $post) 
    {
        if ($post->status !== 'publish') abort(404);
        return view('show', compact('post'));
    }

    public function kategori(string $id)
    {
        $category = Category::find($id);
        $posts = $category->posts()->with(['category', 'user'])->where('status', 'publish')->latest()->paginate(9);
       
        return view('kategori', compact('category', 'posts'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $posts = Post::with(['category', 'user'])
            ->where('status', 'publish')
            ->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")->orWhere('content', 'like', "%{$keyword}%");
            })->latest()->paginate(9);
            
        return view('search', compact('posts', 'keyword'));
    }
}