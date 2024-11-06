<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $followingIds = auth()->user()->following()->pluck('users.id');
        $posts = Post::whereIn('user_id', $followingIds)
            ->with(['user', 'likes', 'comments'])
            ->latest()
            ->paginate(10);

        return view('dashboard', compact('posts'));
    }
}