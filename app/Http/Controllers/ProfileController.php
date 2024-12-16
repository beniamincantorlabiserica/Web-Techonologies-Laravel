<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->with(['likes', 'comments'])->latest()->paginate(10);
        return view('profile.show', compact('user', 'posts'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->update(['profile_image' => $imagePath]);
        }

        $user->update($validated);

        return redirect()->route('profile.show', $user);
    }
}