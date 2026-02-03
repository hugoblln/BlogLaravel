<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
{
    $this->authorizeResource(Post::class, 'post');
}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('q');

        if ($search) {
            $posts = Post::search($search)->paginate(10);
        } else {
            $posts = Post::latest()->paginate(10);
        }

        return view('Posts/index', compact('posts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Posts/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
       $data = $request->validated();

       $data['user_id'] = Auth::id();

        Post::create($data);

       return redirect()->route('posts.index')->with('success', 'Post créer avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = $post->comments;

        return view('Posts/show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('Posts/edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $newData = $request->validated();

        $post->update($newData);

        return redirect()->route('posts.index')->with('success', 'Post modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post supprimer avec succès');
    }

}
