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
                        <!-- Profile Card with Hover Effect -->
                        <div class="mb-4 p-4 bg-white rounded-lg shadow-lg profile-card hover:shadow-xl hover:scale-105 transition-all duration-300">
                            <div class="flex items-center mb-2">
                                <img src="{{ $post->user->profile_image ? asset('storage/' . $post->user->profile_image) : asset('images/default-avatar.png') }}" 
                                    alt="{{ $post->user->name }}" 
                                    class="w-10 h-10 rounded-full mr-2 profile-image hover:scale-110 transition-transform duration-300">
                                
                                <a href="{{ route('profile.show', $post->user) }}" 
                                    class="font-semibold text-lg profile-name hover:text-blue-500 transition-colors duration-300">
                                    {{ $post->user->name }}
                                </a>
                            </div>

                            <span class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                            <p class="mb-2 mt-4">{{ $post->content }}</p>

                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" 
                                    alt="Post image" 
                                    class="mb-2 rounded-lg max-w-full h-auto">
                            @endif

                            <div class="flex items-center text-sm text-gray-500">
                                <span class="mr-2 like-count" data-post-id="{{ $post->id }}">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                                <span>{{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}</span>
                            </div>

                            <div class="mt-2">
                                <button class="like-button {{ $post->likes->contains('user_id', auth()->id()) ? 'liked' : '' }}" data-post-id="{{ $post->id }}">
                                    ❤️ Like
                                </button>
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-ghost">View Comments</a>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }

        .like-button {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: #3490dc;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .like-button:hover {
            background-color: #2779bd;
        }

        .like-button.liked {
            background-color: #e0245e;
            transform: scale(1.1);
        }

        .like-button.clicked {
            animation: scale-up 0.3s ease;
        }

        @keyframes scale-up {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.3);
            }
            100% {
                transform: scale(1);
            }
        }

        .heart-burst {
            position: absolute;
            width: 50px;
            height: 50px;
            background: rgba(224, 36, 94, 0.4);
            border-radius: 50%;
            animation: burst 0.6s ease forwards;
        }

        @keyframes burst {
            0% {
                opacity: 1;
                transform: scale(1);
            }
            100% {
                opacity: 0;
                transform: scale(2);
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const likeButtons = document.querySelectorAll('.like-button');

            likeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const postId = button.getAttribute('data-post-id');
                    
                    button.classList.add('clicked');
                    setTimeout(() => button.classList.remove('clicked'), 300);
                    
                    button.classList.toggle('liked');

                    const burst = document.createElement('div');
                    burst.classList.add('heart-burst');
                    button.appendChild(burst);
                    
                    setTimeout(() => burst.remove(), 600);

                    const likeCountElement = document.querySelector(`.like-count[data-post-id="${postId}"]`);
                    let currentCount = parseInt(likeCountElement.textContent) || 0;

                    if (button.classList.contains('liked')) {
                        currentCount++;
                    } else {
                        currentCount--;
                    }

                    likeCountElement.textContent = `${currentCount} ${currentCount === 1 ? 'like' : 'likes'}`;
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const profileCards = document.querySelectorAll('.profile-card');

            profileCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transition = 'all 0.3s ease';
                    card.style.transform = 'scale(1.05)';
                    card.style.boxShadow = '0 10px 20px rgba(0,0,0,0.1)';
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transition = 'all 0.3s ease';
                    card.style.transform = 'scale(1)';
                    card.style.boxShadow = '0 4px 6px rgba(0,0,0,0.1)';
                });

                const profileImage = card.querySelector('.profile-image');
                profileImage.addEventListener('mouseenter', () => {
                    profileImage.style.transition = 'transform 0.3s ease';
                    profileImage.style.transform = 'scale(1.2)';
                });

                profileImage.addEventListener('mouseleave', () => {
                    profileImage.style.transition = 'transform 0.3s ease';
                    profileImage.style.transform = 'scale(1)';
                });

                const profileName = card.querySelector('.profile-name');
                profileName.addEventListener('mouseenter', () => {
                    profileName.style.transition = 'color 0.3s ease';
                    profileName.style.color = '#3490dc';
                });

                profileName.addEventListener('mouseleave', () => {
                    profileName.style.transition = 'color 0.3s ease';
                    profileName.style.color = '#000';
                });
            });
        });
    </script>
</x-app-layout>