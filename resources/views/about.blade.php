<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-purple-600/10"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-medium mb-6">
                    About Us
                </span>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 mb-6">
                    Who We Are
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    We're passionate about creating innovative solutions that transform businesses and empower people to achieve their goals.
                </p>
            </div>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Our Mission -->
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Mission</h2>
                <p class="text-gray-600 leading-relaxed">
                    To deliver cutting-edge technology solutions that simplify complex challenges and drive meaningful impact for our clients worldwide.
                </p>
            </div>

            <!-- Our Vision -->
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Vision</h2>
                <p class="text-gray-600 leading-relaxed">
                    To be the global leader in innovative technology solutions, empowering businesses to thrive in the digital age.
                </p>
            </div>
        </div>
    </div>

    <!-- Our Values -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Core Values</h2>
                <p class="text-lg text-gray-600">The principles that guide everything we do</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Excellence</h3>
                    <p class="text-gray-600">We strive for the highest quality in everything we deliver</p>
                </div>

                <!-- Value 2 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Collaboration</h3>
                    <p class="text-gray-600">Together we achieve more than we could alone</p>
                </div>

                <!-- Value 3 -->
                <div class="text-center p-6 rounded-xl hover:bg-gray-50 transition">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Innovation</h3>
                    <p class="text-gray-600">We constantly push boundaries and explore new possibilities</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Stats -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl p-12 text-white">
            <h2 class="text-4xl font-bold text-center mb-12">By The Numbers</h2>
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-5xl font-bold mb-2">500+</div>
                    <div class="text-blue-100">Clients Worldwide</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">50+</div>
                    <div class="text-blue-100">Team Members</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">1000+</div>
                    <div class="text-blue-100">Projects Completed</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">99%</div>
                    <div class="text-blue-100">Client Satisfaction</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 border border-gray-100">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">Get In Touch</h2>
                <p class="text-gray-600">Have a question or want to work together? We'd love to hear from you.</p>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="space-y-6">
                    <!-- Title Field -->
                    <div>
                        <label for="title" class="block mb-2 text-sm font-semibold text-gray-700">
                            Your Name <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="title"
                            name="title" 
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                            placeholder="Name" 
                            value="{{ old('title') }}" 
                            required
                        />
                        {{-- @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-semibold text-gray-700">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                            placeholder="example@domain.com" 
                            value="{{ old('email') }}" 
                            required
                        />
                        {{-- @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <!-- Subject/Slug Field -->
                    <div>
                        <label for="slug" class="block mb-2 text-sm font-semibold text-gray-700">
                            Subject <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="slug"
                            name="slug" 
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                            placeholder="How can we help you?" 
                            value="{{ old('slug') }}" 
                            required
                        />
                        {{-- @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label for="message" class="block mb-2 text-sm font-semibold text-gray-700">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="message"
                            name="message" 
                            rows="5"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none" 
                            placeholder="Tell us about your project or inquiry..."
                            required
                        ></textarea>
                        {{-- @error('message')
                           <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                        @enderror --}}
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-4 px-6 rounded-lg hover:from-blue-700 hover:to-purple-700 focus:ring-4 focus:ring-blue-300 transition shadow-lg hover:shadow-xl"
                    >
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Contact Info -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Email -->
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Email Us</h3>
                <p class="text-gray-600">info@itmega.com</p>
            </div>

            <!-- Phone -->
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Call Us</h3>
                <p class="text-gray-600">+1 (555) 123-4567</p>
            </div>

            <!-- Location -->
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Visit Us</h3>
                <p class="text-gray-600">Phnom Penh, Cambodia</p>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>