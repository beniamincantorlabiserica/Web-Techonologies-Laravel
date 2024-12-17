<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Notification;


class LikeController extends Controller
{
    public function like(Post $post)
    {
        auth()->user()->likes()->create([
            'post_id' => $post->id,
        ]);

        // Create notification for post owner
    Notification::create([
            'user_id' => $post->user_id,
            'sender_id' => auth()->id(),
            'post_id' => $post->id,
            'type' => 'like'
        ]);
    

        return back();
    }

    public function unlike(Post $post)
    {
        auth()->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}