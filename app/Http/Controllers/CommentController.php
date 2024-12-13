<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $sanitizedContent = sanitize_input($validated['content']);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $sanitizedContent,
        ]);

        return back();
    }
}
