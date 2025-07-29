<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }
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
            "image" => "image|mimes:jpg,png,jpeg|max:2048",
        ]);
        $add = $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->file('image')->store('post_images', 'public'),
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
        Gate::authorize('modify', $post);
        $request->validate([
            'title' => 'required|min:3|max:15',
            'description' => 'required|min:8|max:255',
            "image" => "image|mimes:jpg,png,jpeg|max:2048",
        ]);
        $previousimage = $post->image;
        if ($request->hasFile('image')) {
            if ($previousimage && Storage::disk('public')->exists($previousimage)) {
                Storage::disk('public')->delete($previousimage);
            }

            // ✅ Store new file
            $imagePath = $request->file('image')->store('post_images', 'public');
        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            "image" => $imagePath,
            'updated_at' => Now(),
        ]);
        return $previousimage;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('modify', $post);
        $post->delete();
        return ['message', $post];
    }
}
