<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($posts as $post)
                        <div class="mb-4 p-4 bg-white rounded-lg shadow">
                            <div class="flex items-center mb-2">
                                <img src="{{ $post->user->profile_image ? asset('storage/' . $post->user->profile_image) : asset('images/default-avatar.png') }}" alt="{{ $post->user->name }}" class="w-10 h-10 rounded-full mr-2">
                                <a href="{{ route('profile.show', $post->user) }}" class="font-semibold text-lg">{{ $post->user->name }}</a>
                            </div>
                            <span class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                            <p class="mb-2 mt-4">{{ $post->content }}</p>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="mb-2 rounded-lg max-w-full h-auto">
                            @endif
                            <div class="flex items-center text-sm text-gray-500">
                               
                                <span class="mr-2">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                                <span>{{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}</span>
                            </div>
                            <div class="mt-2">
                                @if ($post->likes->contains('user_id', auth()->id()))
                                    <form action="{{ route('unlike', $post) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-error">Unlike</button>
                                    </form>
                                @else
                                    <form action="{{ route('like', $post) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">Like</button>
                                    </form>
                                @endif
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-ghost">View Comments</a>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>