<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Globalink - Connect Globally, Share Locally</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-base-200">
    <!-- Navbar -->
    <div class="navbar bg-base-100 shadow-lg">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="#features">Features</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost text-2xl font-bold text-primary">Globalink</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="#features">Features</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <div class="navbar-end gap-2">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-ghost">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                    @endif
                @endauth
            @endif
            <label class="swap swap-rotate">
                <input type="checkbox" data-toggle-theme="dark,light" class="theme-controller" />
                <svg class="swap-on fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/></svg>
                <svg class="swap-off fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/></svg>
            </label>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="relative overflow-hidden min-h-[85vh] bg-base-200">
        <!-- Background Pattern - World Map Style Dots -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute transform w-full h-full bg-gradient-to-r from-primary/20 to-secondary/20"></div>
        </div>
        
        <div class="relative container mx-auto px-4 py-16">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                <!-- Content Side -->
                <div class="flex-1 text-center lg:text-left max-w-xl">
                    <div class="inline-flex items-center gap-2 bg-base-100 px-4 py-2 rounded-full mb-6 shadow-lg">
                        <div class="badge badge-primary">100% Ad-Free</div>
                        <span class="text-sm">Focus on what matters</span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        Your Home <span class="bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">Away From Home</span>
                    </h1>
                    
                    <p class="text-lg mb-8 text-base-content/80">
                        Stay connected with family while building your international community. A dedicated space for students abroad to share experiences, support each other, and keep loved ones updated - all without any distracting ads.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8 text-left">
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-primary/10 rounded-lg">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18zM9 10h.01M15 10h.01M9.5 15.5c1.5 1 3.5 1 5 0"/>
                                </svg>
                            </div>
                            <span class="text-sm">Share your journey with family back home</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-secondary/10 rounded-lg">
                                <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                                </svg>
                            </div>
                            <span class="text-sm">Connect with students from your country</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-accent/10 rounded-lg">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <span class="text-sm">Get study tips and local insights</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-primary/10 rounded-lg">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                                </svg>
                            </div>
                            <span class="text-sm">Ad-free experience forever</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <button class="btn btn-primary btn-lg">
                            Join Your Community
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="btn btn-outline btn-lg">
                            How It Works
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Image Side -->
                <div class="flex-1 relative">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div class="card bg-base-100 shadow-xl">
                                <div class="card-body p-4">
                                    <div class="avatar placeholder">
                                        <div class="w-12 rounded-full bg-primary/10">
                                            <span class="text-primary">JS</span>
                                        </div>
                                    </div>
                                    <p class="text-sm">Just finished my first semester at UCLA! Missing home but making great friends here 🎓</p>
                                </div>
                            </div>
                            <div class="card bg-base-100 shadow-xl translate-x-8">
                                <div class="card-body p-4">
                                    <div class="avatar placeholder">
                                        <div class="w-12 rounded-full bg-secondary/10">
                                            <span class="text-secondary">MK</span>
                                        </div>
                                    </div>
                                    <p class="text-sm">Found an amazing study group through Globalink! 📚</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4 mt-12">
                            <div class="card bg-base-100 shadow-xl">
                                <div class="card-body p-4">
                                    <div class="avatar placeholder">
                                        <div class="w-12 rounded-full bg-accent/10">
                                            <span class="text-accent">AR</span>
                                        </div>
                                    </div>
                                    <p class="text-sm">Mom loves seeing my daily updates from campus life in London ❤️</p>
                                </div>
                            </div>
                            <div class="card bg-base-100 shadow-xl -translate-x-8">
                                <div class="card-body p-4">
                                    <div class="avatar placeholder">
                                        <div class="w-12 rounded-full bg-primary/10">
                                            <span class="text-primary">LW</span>
                                        </div>
                                    </div>
                                    <p class="text-sm">Connected with other students from Singapore! Movie night this weekend 🍿</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-24 bg-base-200">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Your Global Student Community</h2>
                <p class="text-lg text-base-content/70 max-w-2xl mx-auto">
                    A dedicated space for international students to stay connected with home while building lasting friendships abroad - without any distracting advertisements.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Stay Connected with Home -->
                <div class="card bg-base-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 rounded-full bg-primary/10 flex items-center justify-center">
                                <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <h3 class="card-title">Stay Connected with Home</h3>
                        </div>
                        <div class="space-y-4">
                            <p>Share your daily adventures with family back home through:</p>
                            <ul class="space-y-2">
                                <li class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Photo & video updates
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Private family groups
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Real-time notifications
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Connect with Fellow Students -->
                <div class="card bg-base-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 rounded-full bg-secondary/10 flex items-center justify-center">
                                <svg class="w-7 h-7 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="card-title">Student Community</h3>
                        </div>
                        <div class="space-y-4">
                            <p>Find and connect with students who share your journey:</p>
                            <ul class="space-y-2">
                                <li class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Country-based groups
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Study meetups
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Cultural events
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Ad-Free Experience -->
                <div class="card bg-base-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 rounded-full bg-accent/10 flex items-center justify-center">
                                <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="card-title">Clean, Ad-Free Platform</h3>
                        </div>
                        <div class="space-y-4">
                            <p>Focus on what matters most with:</p>
                            <ul class="space-y-2">
                                <li class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Zero advertisements
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Distraction-free design
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Privacy-focused
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-base-300 py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Our Growing Global Community</h2>
                <p class="text-base-content/70 max-w-2xl mx-auto">
                    Join thousands of international students already sharing their journey on our ad-free platform
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Active Students -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-all">
                    <div class="card-body p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="stat-value text-primary text-4xl font-bold mb-2">25K+</div>
                            <div class="stat-title text-base-content/70">Active Students</div>
                            <div class="stat-desc text-xs mt-2">From 150+ countries</div>
                        </div>
                    </div>
                </div>

                <!-- Universities -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-all">
                    <div class="card-body p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 rounded-full bg-secondary/10 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="stat-value text-secondary text-4xl font-bold mb-2">500+</div>
                            <div class="stat-title text-base-content/70">Universities</div>
                            <div class="stat-desc text-xs mt-2">Across 30 countries</div>
                        </div>
                    </div>
                </div>

                <!-- Study Groups -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-all">
                    <div class="card-body p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 rounded-full bg-accent/10 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="stat-value text-accent text-4xl font-bold mb-2">3.2K</div>
                            <div class="stat-title text-base-content/70">Study Groups</div>
                            <div class="stat-desc text-xs mt-2">Active this month</div>
                        </div>
                    </div>
                </div>

                <!-- Ad-Free Days -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-all">
                    <div class="card-body p-6">
                        <div class="flex flex-col items-center">
                            <div class="w-16 h-16 rounded-full bg-success/10 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="stat-value text-success text-4xl font-bold mb-2">100%</div>
                            <div class="stat-title text-base-content/70">Ad-Free Days</div>
                            <div class="stat-desc text-xs mt-2">Now and forever</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Stats Banner -->
            <div class="mt-12 card bg-primary text-primary-content">
                <div class="card-body p-6">
                    <div class="flex flex-wrap justify-center gap-8 text-center">
                        <div>
                            <div class="text-2xl font-bold mb-1">12M+</div>
                            <div class="text-sm opacity-90">Messages Shared</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold mb-1">45K+</div>
                            <div class="text-sm opacity-90">Family Updates</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold mb-1">98%</div>
                            <div class="text-sm opacity-90">Student Satisfaction</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold mb-1">24/7</div>
                            <div class="text-sm opacity-90">Community Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile App Section -->
    <div class="bg-base-200 py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="flex-1">
                    <h2 class="text-3xl font-bold mb-4">Take Globalink Everywhere</h2>
                    <p class="mb-6">Download our mobile app and stay connected with your global community anywhere, anytime.</p>
                    <div class="flex gap-4">
                        <button class="btn btn-primary">App Store</button>
                        <button class="btn btn-primary">Google Play</button>
                    </div>
                </div>
                <div class="flex-1">
                    <img src="/api/placeholder/300/600" alt="Mobile App" class="rounded-lg shadow-2xl mx-auto" />
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-base-300 py-16">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold mb-4">Stay Updated</h2>
                <p class="mb-8">Subscribe to our newsletter for the latest features, communities, and global trends.</p>
                <div class="join">
                    <input class="input input-bordered join-item" placeholder="Email"/>
                    <button class="btn btn-primary join-item">Subscribe</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer p-10 bg-base-100 text-base-content">
        <div>
            <span class="footer-title">Company</span> 
            <a class="link link-hover">About us</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Careers</a>
            <a class="link link-hover">Press kit</a>
        </div> 
        <div>
            <span class="footer-title">Legal</span> 
            <a class="link link-hover">Terms of use</a>
            <a class="link link-hover">Privacy policy</a>
            <a class="link link-hover">Cookie policy</a>
        </div> 
        <div>
            <span class="footer-title">Social</span> 
            <div class="grid grid-flow-col gap-4">
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
                <a><svg xmlns="http://www.w3.org/2000/24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
            </div>
            <div class="mt-4 text-sm">
                <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
                <p class="mt-2">© 2024 Globalink. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Login/Register Modal -->
    <dialog id="auth-modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Welcome to Globalink</h3>
            <p class="py-4">Join our global community today and start sharing your story with the world.</p>
            <div class="modal-action">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary">Create Account</a>
                @endif
                <a href="{{ route('login') }}" class="btn">Login</a>
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
            </div>
        </div>
    </dialog>

    <!-- Cookie Consent -->
    <div class="toast toast-bottom toast-end">
        <div class="alert alert-info">
            <span>We use cookies to enhance your experience.</span>
            <div>
                <button class="btn btn-sm">Accept</button>
                <button class="btn btn-sm btn-ghost">Decline</button>
            </div>
        </div>
    </div>
</body>
</html>