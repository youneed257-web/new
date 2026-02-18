<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create book</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <h1 class="text-6xl text-center mb-5 uppercase text-fg-brand py-4 underline">Update Book</h1>
</head>

<body>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <form class="max-w-sm mx-auto" method="POST" action="{{ route('book.update', $book->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-5">
                        <h2 class="mb-5 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">Please Update your details</h2>
                        <label for="email-alternative"
                            class="block mb-2.5 text-sm font-medium text-heading">Title</label>
                        <input type="text" name="title"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow placeholder:text-body"
                            placeholder="Title" value="{{ $book->title }}" />
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="email-alternative"
                            class="block mb-2.5 text-sm font-medium text-heading">Slug</label>
                        <input type="text" name="slug"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow placeholder:text-body"
                            placeholder="slug" value="{{ $book->slug }}" />
                        @error('slug')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your
                            message</label>
                        <textarea id="message" rows="6"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Leave a comment..."></textarea>
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2.5 text-sm font-medium text-heading" for="multiple_files">Upload
                            multiple
                            files</label>
                        <input
                            class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body"
                            id="multiple_files" type="file" multiple>
                    </div>
                    <button type="submit"
                        class="mt-5 text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Update Book</button>
                </form>
            </div>
        </div>
    </div>
</body>
@livewireScripts
</html>
