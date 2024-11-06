<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Search Results for "{{ $query }}"</h3>

                    <h4 class="text-md font-semibold mt-4 mb-2">Users</h4>
                    @forelse ($users as $user)
                        <div class="mb-2">
                            <a href="{{ route('profile.show', $user) }}" class="text-blue-500 hover:underline">{{ $user->name }}</a>
                        </div>
                    @empty
                        <p>No users found.</p>
                    @endforelse

                    <h4 class="text-md font-semibold mt-4 mb-2">Posts</h4>
                    @forelse ($posts as $post)
                        <div class="mb-2">
                            <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline">{{ Str::limit($post->content, 100) }}</a>
                            <p class="text-sm text-gray-500">by {{ $post->user->name }}</p>
                        </div>
                    @empty
                        <p>No posts found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>