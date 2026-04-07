<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SIMPAN KOMENTAR
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'nama' => 'required|string|max:100',
            'komentar' => 'required|string'
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'nama' => $request->nama,
            'komentar' => $request->komentar
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan');
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS KOMENTAR
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus');
    }
}