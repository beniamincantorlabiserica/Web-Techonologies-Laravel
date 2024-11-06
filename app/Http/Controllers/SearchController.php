<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', "%{$query}%")->take(5)->get();
        $posts = Post::where('content', 'like', "%{$query}%")->with('user')->take(5)->get();

        return view('search.results', compact('users', 'posts', 'query'));
    }
}