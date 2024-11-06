<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DiscoverController extends Controller
{
    public function index()
    {
        $users = User::whereNotIn('id', [auth()->id()])
            ->withCount('followers')
            ->orderByDesc('followers_count')
            ->paginate(20);

        return view('discover', compact('users'));
    }
}