<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body>
    @extends('layouts.app')
    <!-- Hero Section -->
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <!-- Hero Content -->
        <div class="container mx-auto px-6 pt-20 pb-32">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Column -->
                <div class="space-y-8">
                    <div class="inline-block">
                        <span class="px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-medium">
                            ✨ Mega Management System
                        </span>
                    </div>

                    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight">
                        Welcome to <br>
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            IT MEGA
                        </span>
                    </h1>

                    <p class="text-xl text-gray-600 leading-relaxed">
                        Transform your ideas into reality with our powerful platform.
                        Get started today and join thousands of satisfied users.
                    </p>
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8">
                        <div>
                            <div class="text-3xl font-bold text-gray-900">10K+</div>
                            <div class="text-sm text-gray-600">Customers Booking</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900">100%</div>
                            <div class="text-sm text-gray-600">Customer Service</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900">10/10</div>
                            <div class="text-sm text-gray-600">IT Support</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Illustration/Image -->
                <div class="hidden md:block">
                    <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition">
                        <img class="h-auto w-full object-cover hover:scale-105 transition duration-300"
                            src="{{ asset('img/net9.png') }}" alt="Image 1">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <section class="bg-neutral-primary">
                <div class="py-8 px-4 mx-auto max-w-screen-2xl text-center lg:py-16">
                    <h1 class="mb-6 text-4xl font-bold tracking-tighter text-heading md:text-5xl lg:text-6xl">We invest
                        in the world’s potential</h1>
                    <div
                        class="mb-6 py-8 bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden rounded-2xl shadow-xl border border-gray-200">
                        <div class="carousel-container">
                            <div class="carousel-track flex gap-8">
                                <!-- Card 1 -->
                                <div
                                    class="carousel-card flex-shrink-0 bg-white rounded-xl p-6 shadow-lg border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 w-[600px]">
                                    <div class="flex items-start gap-4">
                                        <div class="bg-blue-100 p-3 rounded-lg">
                                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">Innovation Focus</h3>
                                            <p class="text-gray-600">
                                                Here at IT MEGA we focus on markets where technology, innovation, and
                                                capital can unlock long-term value and drive economic growth.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 2 -->
                                <div
                                    class="carousel-card flex-shrink-0 bg-white rounded-xl p-6 shadow-lg border-2 border-purple-200 hover:border-purple-400 transition-all duration-300 w-[600px]">
                                    <div class="flex items-start gap-4">
                                        <div class="bg-purple-100 p-3 rounded-lg">
                                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">Growth Strategy</h3>
                                            <p class="text-gray-600">
                                                Here at IT MEGA we focus on markets where technology, innovation, and
                                                capital can unlock long-term value and drive economic growth.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 3 (duplicate for seamless loop) -->
                                <div
                                    class="carousel-card flex-shrink-0 bg-white rounded-xl p-6 shadow-lg border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 w-[600px]">
                                    <div class="flex items-start gap-4">
                                        <div class="bg-blue-100 p-3 rounded-lg">
                                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">Innovation Focus</h3>
                                            <p class="text-gray-600">
                                                Here at IT MEGA we focus on markets where technology, innovation, and
                                                capital can unlock long-term value and drive economic growth.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .carousel-container {
                            overflow: hidden;
                        }

                        .carousel-track {
                            animation: carousel 30s linear infinite;
                        }

                        .carousel-track:hover {
                            animation-play-state: paused;
                        }

                        @keyframes carousel {
                            0% {
                                transform: translateX(0);
                            }

                            100% {
                                transform: translateX(calc(-616px * 2));
                            }
                        }
                    </style>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 md:space-x-4"></div>
                    <a href="#"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-brand hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium">
                        Get started
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100">
                        Learn more
                    </a>
                </div>
        </div>
        </section>
    </div>
    </div>
    {{-- this is body --}}
    <div>
        <div class="text-center py-10 text-fg-brand">
            <div class="relative inline-block">
                <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <rect x="2" y="2" width="calc(100% - 4px)" height="calc(100% - 4px)" fill="none"
                        stroke="url(#gradient)" stroke-width="3" rx="8" class="animate-dash" />
                    <defs>
                        <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                            <stop offset="50%" style="stop-color:#8b5cf6;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#ec4899;stop-opacity:1" />
                        </linearGradient>
                    </defs>
                </svg>
                <p class="relative px-8 py-4 text-2ml font-bold text-gray-800">
                    IT MEGA
                </p>
            </div>
            <style>
                @keyframes dash {
                    to {
                        stroke-dashoffset: 1000;
                    }
                }

                .animate-dash {
                    stroke-dasharray: 20;
                    animation: dash 20s linear infinite;
                }
            </style>
            <div class="container mx-auto px-4 py-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Image 1 -->
                    <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition">
                        <img class="h-auto w-full object-cover hover:scale-105 transition duration-300"
                            src="{{ asset('img/net1.jpg') }}" alt="Image 1">
                    </div>
                    <!-- Image 2 -->
                    <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition">
                        <img class="h-auto w-full object-cover hover:scale-105 transition duration-300"
                            src="{{ asset('/img/net2.png') }}" alt="Image 2">
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition">
                        <img class="h-auto w-full object-cover hover:scale-105 transition duration-300"
                            src="{{ asset('img/net3.jpg') }}" alt="Image 1">
                    </div>
                    <!-- Image 2 -->
                    <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition">
                        <img class="h-auto w-full object-cover hover:scale-105 transition duration-300"
                            src="{{ asset('/img/net4.jpg') }}" alt="Image 2">
                    </div>
                    <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition">
                        <img class="h-auto w-full object-cover hover:scale-105 transition duration-300"
                            src="{{ asset('img/net5.jpg') }}" alt="Image 1">
                    </div>
                    <!-- Image 2 -->
                    <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition">
                        <img class="h-auto w-full object-cover hover:scale-105 transition duration-300"
                            src="{{ asset('/img/net6.jpg') }}" alt="Image 3">
                    </div>

                    <!-- Image 3 -->
                    <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition">
                        <img class="h-auto w-full object-cover hover:scale-105 transition duration-300"
                            src="{{ asset('img/net1.jpg') }}" alt="Image 3">
                    </div>

                    <!-- Image 4 -->
                    <div class="overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition">
                        <img class="h-auto w-full object-cover hover:scale-105 transition duration-300"
                            src="{{ asset('img/net2.png') }}" alt="Image 4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Section -->
    <div id="features" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Everything you need to succeed
                </h2>
                <p class="text-xl text-gray-600">
                    Powerful features to help you achieve your goals
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="p-8 rounded-xl border border-gray-200 hover:shadow-lg transition group">
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-blue-600 transition">
                        <svg class="w-6 h-6 text-blue-600 group-hover:text-white transition" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Lightning Fast</h3>
                    <p class="text-gray-600">
                        Experience blazing fast performance with our optimized platform.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="p-8 rounded-xl border border-gray-200 hover:shadow-lg transition group">
                    <div
                        class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-purple-600 transition">
                        <svg class="w-6 h-6 text-purple-600 group-hover:text-white transition" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Secure & Private</h3>
                    <p class="text-gray-600">
                        Your data is protected with enterprise-grade security.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="p-8 rounded-xl border border-gray-200 hover:shadow-lg transition group">
                    <div
                        class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-green-600 transition">
                        <svg class="w-6 h-6 text-green-600 group-hover:text-white transition" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Team Collaboration</h3>
                    <p class="text-gray-600">
                        Work together seamlessly with your team in real-time.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-20 bg-gradient-to-r from-blue-600 to-purple-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-white mb-4">
                Ready to get started?
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                Join thousands of users already using our platform
            </p>
            <a href="#signup"
                class="inline-block px-8 py-4 bg-white text-blue-600 rounded-lg hover:bg-gray-100 transition shadow-lg hover:shadow-xl font-medium">
                Join Now
            </a>
        </div>
    </div>
</body>

</html>
