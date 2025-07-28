<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:15|unique:posts,title',
            'description' => 'required|min:8|max:255',
        ]);
        $add = Post::insert([
            'title'=> $request->title,
            'description'=> $request->description,
            'created_at' => Now(),
            'updated_at' => Now(),
        ]);
        return $add;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3|max:15|unique:posts,title',
            'description' => 'required|min:8|max:255',
        ]);
        $post->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'updated_at' => Now(),
        ]);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return ['message' , 'Deleted'];
    }
}
