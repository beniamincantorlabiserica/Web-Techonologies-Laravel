<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discover') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-semibold mb-4">Suggested Users</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($users as $user)
                            <div class="bg-white p-4 rounded-lg shadow">
                                <div class="flex items-center mb-2">
                                    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/default-avatar.png') }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full mr-2">
                                    <div>
                                        <a href="{{ route('profile.show', $user) }}" class="font-semibold">{{ $user->name }}</a>
                                        <p class="text-sm text-gray-500">{{ $user->followers_count }} {{ Str::plural('follower', $user->followers_count) }}</p>
                                    </div>
                                </div>
                                @if (auth()->user()->following->contains($user->id))
                                    <form action="{{ route('unfollow', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-error w-full">Unfollow</button>
                                    </form>
                                @else
                                    <form action="{{ route('follow', $user) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary w-full">Follow</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>