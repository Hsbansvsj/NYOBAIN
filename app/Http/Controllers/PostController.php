<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    // =======================
    // LIST DATA
    // =======================
    public function index()
    {
        $posts = Post::with(['category', 'user'])
            ->latest()
            ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    // =======================
    // FORM CREATE
    // =======================
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    // =======================
    // SIMPAN DATA
    // =======================
    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|max:255',
            'isi'         => 'required',
            'category_id' => 'required|exists:categories,id',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('gambar');

        // Upload gambar
        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();

            $path = public_path('uploads');

            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $file->move($path, $filename);

            $data['gambar'] = $filename;
        }

        // User login (fallback ke 1 kalau belum login)
        $data['user_id'] = Auth::id() ?? 1;

        Post::create($data);

        return redirect()->route('posts.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    // =======================
    // DETAIL (INI YANG ERROR TADI)
    // =======================
    public function show($id)
    {
        $post = Post::with(['category', 'user'])
            ->findOrFail($id);

        return view('posts.show', compact('post'));
    }

    // =======================
    // FORM EDIT
    // =======================
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    // =======================
    // UPDATE DATA
    // =======================
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'       => 'required|max:255',
            'isi'         => 'required',
            'category_id' => 'required|exists:categories,id',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post = Post::findOrFail($id);
        $data = $request->except('gambar');

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($post->gambar && File::exists(public_path('uploads/' . $post->gambar))) {
                File::delete(public_path('uploads/' . $post->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);

            $data['gambar'] = $filename;
        }

        $post->update($data);

        return redirect()->route('posts.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    // =======================
    // HAPUS DATA
    // =======================
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Hapus gambar
        if ($post->gambar && File::exists(public_path('uploads/' . $post->gambar))) {
            File::delete(public_path('uploads/' . $post->gambar));
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}