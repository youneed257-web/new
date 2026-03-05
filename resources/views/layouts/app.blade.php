<!DOCTYPE html>
<html>

<head>
    <title>{{ $title ?? 'Home' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <!-- Main Content -->
    <main>
        @yield('content')
        <nav class="bg-neutral-primary fixed w-full z-20 top-0 start-0 border-b border-default">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-7" alt="Flowbite Logo" /> --}}
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent text-2xl">
                        MEGA Management
                    </span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary">

                        <li>
                            <a href="{{ route('home') }}"
                                class="flex items-center gap-2 py-2 px-3 text-white bg-brand rounded md:bg-transparent md:text-fg-brand md:p-0"
                                aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                                    <path
                                        d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                                </svg>
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}"
                                class="flex items-center gap-2 py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                        clip-rule="evenodd" />
                                </svg>
                                About
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                                class="flex items-center gap-2 py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M2.038 5.61A2.01 2.01 0 0 0 2 6v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6c0-.12-.01-.238-.03-.352l-.866.65-7.89 6.032a2 2 0 0 1-2.429 0L2.884 6.288l-.846-.677Z" />
                                    <path
                                        d="M20.677 4.117A1.996 1.996 0 0 0 20 4H4c-.225 0-.44.037-.642.105l.758.607L12 10.742 19.9 4.7l.777-.583Z" />
                                </svg>
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mainnet') }}"
                                class="flex items-center gap-2 py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 2a10 10 0 1 0 10 10A10.009 10.009 0 0 0 12 2Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.093 20.093 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM10 3.707a8.82 8.82 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 10 3.707Zm-6.358 6.555a8.57 8.57 0 0 1 4.73-5.981 53.99 53.99 0 0 1 1.157 2.265 11.879 11.879 0 0 1-5.887 3.716Zm-.988 2.134a8.5 8.5 0 0 0 8.063 8.551 11.966 11.966 0 0 1-7.709-7.12 8.485 8.485 0 0 0-.354-1.431Zm9.385 8.598a8.5 8.5 0 0 0 8.362-8.57 20.4 20.4 0 0 0-4.969.816 11.67 11.67 0 0 1-3.393 7.754Zm3.728-9.216a18.214 18.214 0 0 1 5.372-.257 8.5 8.5 0 0 0-1.696-4.13 9.7 9.7 0 0 1-3.676 4.387Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Data Internet
                            </a>
                        </li>
                        @can('Role-create')
                            <li>
                                <a href="{{ route('role.index') }}"
                                    class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Role</a>
                            </li>
                        @endcan
                        @can('Permission-create')
                            <li>
                                <a href="{{ route('permission.index') }}"
                                    class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Permission</a>
                            </li>
                        @endcan
                        @can('User create')
                            <li>
                                <a href="{{ route('user.create') }}"
                                    class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">User</a>
                            </li>
                        @endcan
                        {{-- @can('User create')
                        <li>
                            <a href="/create"
                                class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Create</a>
                        </li>
                        @endcan
                        <li>
                            <a href="/show"
                                class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Data</a>
                        </li> --}}
                        <li>
                            <a href="/admin"
                                class="flex items-center gap-2 py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.644 3.066a1 1 0 0 1 .712 0l7 2.625A1 1 0 0 1 20 6.75v1.5c0 5.135-3.04 9.86-7.646 11.97a1 1 0 0 1-.808 0C7.038 18.109 4 13.385 4 8.25v-1.5a1 1 0 0 1 .644-.934l7-2.625Zm3.274 6.526a1 1 0 1 0-1.414-1.414L10 11.68l-1.47-1.47a1 1 0 0 0-1.414 1.415l2.184 2.183a1 1 0 0 0 1.414 0l3.604-3.716Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Admin
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                class="flex items-center gap-2 py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 4a1 1 0 0 1 1 1v8a1 1 0 1 1-2 0V5a1 1 0 0 1 1-1Zm-4.055.24A1 1 0 0 1 8.5 5.6a7 7 0 1 0 7 0 1 1 0 1 1 1-1.724A9 9 0 1 1 3 12a9 9 0 0 1 4.945-8.024 1 1 0 0 1 .055 1.265Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </main>

    @livewireScripts
    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="text-white text-xl font-bold mb-4">Mega Management</div>
                    <p class="text-sm">Building the future, one step at a time.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Product</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Features</a></li>
                        <li><a href="#" class="hover:text-white transition">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition">Security</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Company</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">About</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Privacy</a></li>
                        <li><a href="#" class="hover:text-white transition">Terms</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} IT Mega. All rights reserved.</p>
            </div>
        </div>
    </footer>


</body>

</html>
