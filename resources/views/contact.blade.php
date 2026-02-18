<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contact</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
                <div class="container mx-auto px-4">
                    <h1 class="text-5xl md:text-6xl font-bold text-center mb-4">Contact Us</h1>
                    <p class="text-xl text-center text-blue-100 max-w-2xl mx-auto">
                        We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                    </p>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="container mx-auto px-4 py-16">
                <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">

                    <!-- Contact Form -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">Send us a Message</h2>
                        <form action="#" method="POST" class="space-y-6">
                            @csrf

                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full
                                    Name</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email
                                    Address</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject</label>
                                <input type="text" id="subject" name="subject" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                                Send Message
                            </button>
                        </form>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <!-- Contact Details Card -->
                        <div class="bg-white rounded-2xl shadow-xl p-8">
                            <h2 class="text-3xl font-bold text-gray-800 mb-6">Contact Information</h2>

                            <div class="space-y-6">
                                <div class="flex items-start space-x-4">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-1">Address</h3>
                                        <p class="text-gray-600">123 Business Street<br>City, State 12345</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-1">Email</h3>
                                        <p class="text-gray-600">info@itmega.com<br>support@itmega.com</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-1">Phone</h3>
                                        <p class="text-gray-600">+1 (555) 123-4567<br>+1 (555) 987-6543</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Business Hours Card -->
                        <div class="bg-gradient-to-br from-blue-600 to-purple-600 text-white rounded-2xl shadow-xl p-8">
                            <h2 class="text-2xl font-bold mb-4">Business Hours</h2>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span>Monday - Friday</span>
                                    <span class="font-semibold">9:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Saturday</span>
                                    <span class="font-semibold">10:00 AM - 4:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Sunday</span>
                                    <span class="font-semibold">Closed</span>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Links -->
                        <div class="bg-white rounded-2xl shadow-xl p-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Follow Us</h2>
                            <div class="flex space-x-4">
                                <a href="#"
                                    class="bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                </a>
                                <a href="https://t.me/yourusername"
                                    class="bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
