<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $user->name }}'s Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center mb-4">
                        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/default-avatar.png') }}" alt="{{ $user->name }}" class="w-20 h-20 rounded-full mr-4">
                        <div>
                            <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            <p class="text-gray-600">{{ $user->followers->count() }} {{ Str::plural('follower', $user->followers->count()) }}</p>
                            <p class="text-gray-600">{{ $user->following->count() }} following</p>
                        </div>
                    </div>

                    @if ($user->id !== auth()->id())
                        @if (auth()->user()->following->contains($user->id))
                            <form action="{{ route('unfollow', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error">Unfollow</button>
                            </form>
                        @else
                            <form action="{{ route('follow', $user) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Follow</button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('profile.edit', $user) }}" class="btn btn-sm btn-ghost">Edit Profile</a>
                    @endif

                    <div class="mt-4">
                        <h3 class="text-xl font-semibold mb-2">Posts</h3>
                        @foreach ($posts as $post)
                            <div class="mb-4 p-4 bg-white rounded-lg shadow">
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
                        @endforeach
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
