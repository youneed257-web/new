<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Book</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
@extends('layouts.app')
<div class="mt-5"></div>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-12 mb-8">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between max-w-4xl mx-auto">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-2">Create New Book</h1>
                    <p class="text-blue-100">Add a new book to your library collection</p>
                </div>
                {{-- <a href="{{ route('book.index') }}" 
                    class="hidden md:flex items-center gap-2 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg transition backdrop-blur-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to List
                </a> --}}
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 pb-12">
        <div class="max-w-4xl mx-auto">
            
            <!-- Progress Steps -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center flex-1">
                        <div class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-full font-bold">
                            1
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-gray-800">Book Information</p>
                            <p class="text-xs text-gray-500">Enter basic details</p>
                        </div>
                    </div>
                    <div class="flex-1 border-t-2 border-gray-300 mx-4"></div>
                    <div class="flex items-center flex-1">
                        <div class="flex items-center justify-center w-10 h-10 bg-gray-300 text-gray-600 rounded-full font-bold">
                            2
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-gray-500">Content</p>
                            <p class="text-xs text-gray-400">Add description</p>
                        </div>
                    </div>
                    <div class="flex-1 border-t-2 border-gray-300 mx-4"></div>
                    <div class="flex items-center flex-1">
                        <div class="flex items-center justify-center w-10 h-10 bg-gray-300 text-gray-600 rounded-full font-bold">
                            3
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-gray-500">Media</p>
                            <p class="text-xs text-gray-400">Upload files</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Form Header -->
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                            <div class="bg-blue-100 p-2 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            Book Details
                        </h2>
                        <p class="text-gray-600 mt-2">Please fill in the information below to create a new book entry</p>
                    </div>

                    <!-- Form Body -->
                    <div class="p-8 space-y-6">
                        
                        <!-- Title Field -->
                        <div>
                            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                Book Title <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                    </svg>
                                </div>
                                <input type="text" 
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('title') border-red-500 @enderror"
                                    placeholder="Enter book title (e.g., The Great Gatsby)">
                            </div>
                            @error('title')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Slug Field -->
                        <div>
                            <label for="slug" class="block text-sm font-semibold text-gray-700 mb-2">
                                URL Slug <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                    </svg>
                                </div>
                                <input type="text" 
                                    id="slug"
                                    name="slug"
                                    value="{{ old('slug') }}"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition font-mono text-sm @error('slug') border-red-500 @enderror"
                                    placeholder="book-slug-example">
                            </div>
                            <p class="mt-1 text-xs text-gray-500">URL-friendly version of the title (lowercase, hyphenated)</p>
                            @error('slug')
                                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div>
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Description
                            </label>
                            <div class="relative">
                                <textarea 
                                    id="description"
                                    name="description"
                                    rows="6"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                                    placeholder="Enter a detailed description of the book, including plot summary, key themes, and any other relevant information...">{{ old('description') }}</textarea>
                                <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                    <span id="charCount">0</span> / 1000 characters
                                </div>
                            </div>
                        </div>
                        <!-- Category Selection (Optional) -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Category
                                </label>
                                <select id="category" name="category"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    <option value="">Select a category</option>
                                    <option value="fiction">Fiction</option>
                                    <option value="non-fiction">Non-Fiction</option>
                                    <option value="science">Science</option>
                                    <option value="history">History</option>
                                    <option value="biography">Biography</option>
                                    <option value="poetry">Poetry</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div>
                                <label for="author" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Author
                                </label>
                                <input type="text" 
                                    id="author"
                                    name="author"
                                    value="{{ old('author') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                    placeholder="Author name">
                            </div>
                        </div>

                        <!-- File Upload -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Book Cover & Files
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-blue-500 transition cursor-pointer bg-gray-50">
                                <input 
                                    id="files" 
                                    name="files[]"
                                    type="file" 
                                    multiple
                                    class="hidden"
                                    accept="image/*,.pdf,.doc,.docx">
                                <label for="files" class="cursor-pointer">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                        <p class="text-sm font-semibold text-gray-700 mb-1">
                                            Click to upload or drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, PDF, DOC up to 10MB
                                        </p>
                                    </div>
                                </label>
                            </div>
                            <div id="fileList" class="mt-3 space-y-2"></div>
                        </div>
                    </div>
                    <div class="flex gap-3 justify-center mb-8">
                            <button type="button" 
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-100 transition">
                                Save as Draft
                            </button>
                            <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Create Book
                            </button>
                        </div>
                </form>
            </div>
            <!-- Help Section -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-6">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h3 class="font-semibold text-blue-900 mb-1">Quick Tips</h3>
                        <ul class="text-sm text-blue-800 space-y-1">
                            <li>• Use descriptive titles that clearly identify the book</li>
                            <li>• Slugs should be lowercase with hyphens (e.g., the-great-gatsby)</li>
                            <li>• Add a detailed description to help readers understand the content</li>
                            <li>• Upload a high-quality cover image for better visibility</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Character counter for description
        const description = document.getElementById('description');
        const charCount = document.getElementById('charCount');
        
        if (description && charCount) {
            description.addEventListener('input', function() {
                charCount.textContent = this.value.length;
            });
        }

        // File upload preview
        const fileInput = document.getElementById('files');
        const fileList = document.getElementById('fileList');
        
        if (fileInput && fileList) {
            fileInput.addEventListener('change', function() {
                fileList.innerHTML = '';
                Array.from(this.files).forEach(file => {
                    const fileItem = document.createElement('div');
                    fileItem.className = 'flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200';
                    fileItem.innerHTML = `
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="text-sm text-gray-700 flex-1">${file.name}</span>
                        <span class="text-xs text-gray-500">${(file.size / 1024).toFixed(2)} KB</span>
                    `;
                    fileList.appendChild(fileItem);
                });
            });
        }
    </script>
    @livewireScripts
</body>
</html>