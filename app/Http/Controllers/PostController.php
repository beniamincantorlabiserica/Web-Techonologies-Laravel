<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes', 'comments'])->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:1000',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = auth()->user()->posts()->create([
            'content' => $validated['content'],
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->update(['image' => $imagePath]);
        }

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}