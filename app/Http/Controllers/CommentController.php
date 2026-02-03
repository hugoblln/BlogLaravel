<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Post $post, Request $request)
    {
        $data = $request->validate([
            'content' => 'string|max:255'
        ]);

        $data['user_id'] = Auth::id();

        $data['post_id'] = $post->id;

        Comment::create($data);

        return redirect()->route('posts.show', $post)->with('success', 'commentaire ajouté avec succès');
    }

}
