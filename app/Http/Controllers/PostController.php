<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        // Gunakan paginate agar tidak error links() di blade
        $posts = Post::with(['category', 'user'])->latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|max:255',
            'isi'         => 'required',
            'category_id' => 'required',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $input = $request->all();

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            
            // Cek & Buat folder public/uploads jika belum ada
            $destinationPath = public_path('/uploads');
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            
            $image->move($destinationPath, $name);
            $input['gambar'] = $name;
        }

        $input['user_id'] = Auth::id() ?? 1;

        Post::create($input);

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil diterbitkan!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'category_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $post = Post::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($post->gambar && File::exists(public_path('uploads/' . $post->gambar))) {
                File::delete(public_path('uploads/' . $post->gambar));
            }

            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads'), $name);
            $input['gambar'] = $name;
        }

        $post->update($input);

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->gambar && File::exists(public_path('uploads/' . $post->gambar))) {
            File::delete(public_path('uploads/' . $post->gambar));
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Artikel dihapus!');
    }
}