<x-guest-layout>
    <div class="min-h-screen bg-base-200 flex items-center justify-center px-4">
        <div class="card w-full max-w-md bg-base-100 shadow-xl">
            <div class="card-body">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold">Welcome Back!</h1>
                    <p class="text-base-content/70 mt-2">Connect with your global community</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-control">
                        <x-input-label for="email" :value="__('Email')" class="label">
                            <span class="label-text">Email Address</span>
                        </x-input-label>
                        <x-text-input 
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                            class="input input-bordered w-full"
                            placeholder="your.email@university.edu"
                        />
                        <x-input-error :messages="$errors->get('email')" class="text-error text-sm mt-1" />
                    </div>

                    <!-- Password -->
                    <div class="form-control">
                        <div class="flex justify-between items-center">
                            <x-input-label for="password" :value="__('Password')" class="label">
                                <span class="label-text">Password</span>
                            </x-input-label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                   class="text-sm text-primary hover:text-primary/70 transition-colors">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>
                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="input input-bordered w-full"
                            placeholder="••••••••"
                        />
                        <x-input-error :messages="$errors->get('password')" class="text-error text-sm mt-1" />
                    </div>

                    <!-- Remember Me -->
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input 
                                type="checkbox"
                                name="remember"
                                class="checkbox checkbox-primary checkbox-sm"
                            />
                            <span class="label-text">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" class="btn btn-primary w-full">
                            {{ __('Log in') }}
                        </button>
                    </div>

                    <!-- Registration Link -->
                    <div class="text-center mt-6">
                        <p class="text-base-content/70">
                            New to Globalink?
                            <a href="{{ route('register') }}" class="text-primary hover:text-primary/70 transition-colors">
                                Create an account
                            </a>
                        </p>
                    </div>
                </form>

                <!-- Social Login Options -->
                <div class="divider">or continue with</div>
                
                <div class="flex gap-2">
                    <button class="btn btn-outline flex-1">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Google
                    </button>
                    <button class="btn btn-outline flex-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                        </svg>
                        Facebook
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>