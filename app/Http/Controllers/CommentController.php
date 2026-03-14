<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'nama' => 'required',
            'komentar' => 'required'
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'nama' => $request->nama,
            'komentar' => $request->komentar
        ]);

        return back()->with('success','Komentar berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success','Komentar berhasil dihapus');
    }
}