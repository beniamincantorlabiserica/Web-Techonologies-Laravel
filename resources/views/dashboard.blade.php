<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
                    </div>
                    <h3 class="text-lg font-semibold mb-4">Recent Posts from People You Follow</h3>
                    @forelse ($posts as $post)
                        <div class="mb-4 p-4 bg-white rounded-lg shadow">
                            <div class="flex items-center mb-2">
                                <img src="{{ $post->user->profile_image ? asset('storage/' . $post->user->profile_image) : asset('images/default-avatar.png') }}" alt="{{ $post->user->name }}" class="w-10 h-10 rounded-full mr-2">
                                <a href="{{ route('profile.show', $post->user) }}" class="font-semibold text-lg">{{ $post->user->name }}</a>
                            </div>
                            <p class="mb-2">{{ $post->content }}</p>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="mb-2 rounded-lg max-w-full h-auto">
                            @endif
                            <div class="flex items-center text-sm text-gray-500">
                                <span class="mr-2">{{ $post->created_at->diffForHumans() }}</span>
                                <span class="mr-2">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                                <span>{{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}</span>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-ghost">View Post</a>
                            </div>
                        </div>
                    @empty
                        <p>No recent posts from people you follow.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
