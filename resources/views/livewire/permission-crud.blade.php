<div class="container mx-auto px-4 py-8 max-w-4xl ">
    @livewireStyles
    <style>
        /* Custom scrollbar styling for webkit browsers */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background-color: #f3f4f6;
            border-radius: 10px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: #d1d5db;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background-color: #9ca3af;
        }

        /* Smooth scroll behavior */
        .scrollbar-thin {
            scroll-behavior: smooth;
        }
        #p01 {
            margin-top: 60px;
        }
    </style>

    <!-- Page Header -->
    <p class="mt-10" id="p01"></p>
    <div class="mb-8">
        <div class="flex items-center mb-4">
            <div class="h-12 w-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center mr-4 shadow-md">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-heading">Permission Management</h1>
            </div>
        </div>

        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-500">
                Total Permissions: <span class="font-semibold text-gray-700">{{ $permissions->count() }}</span>
            </div>
            <button @click="$wire.createNewPermission()"
                class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    New Permission
                </span>
            </button>
        </div>
    </div>

    <!-- Permissions Table -->
    <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-heading">All Permissions</h2>
            <p class="text-sm text-gray-600 mt-1">Manage system permissions and access controls</p>
        </div>

        @if($permissions->count() > 0)
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-xs text-gray-700 bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">ID</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">Permission Name</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">Created</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($permissions as $permission)
                            <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 border border-indigo-200">
                                        {{ $permission->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $permission->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-3">
                                        <button @click="$wire.editPermission({{ $permission->id }})"
                                            class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                                            Edit
                                        </button>
                                        <button @click="$wire.deletePermission({{ $permission->id }})"
                                            onclick="return confirm('Are you sure you want to delete this permission? This action cannot be undone.')"
                                            class="text-red-600 hover:text-red-800 font-medium text-sm transition-colors">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                        </svg>
                                        <p class="text-gray-500 font-medium">No permissions found</p>
                                        <p class="text-gray-400 text-sm mt-1">Create your first permission to get started</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Form Modal -->
    @if($showForm)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" @click.self="$wire.closeForm()">
            <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] flex flex-col">
                <!-- Modal Header -->
                <div class="sticky top-0 px-6 py-4 border-b border-gray-200 bg-white flex justify-between items-center z-10 flex-shrink-0">
                    <h3 class="text-xl font-semibold text-heading">
                        {{ $isEditing ? 'Edit Permission' : 'Create New Permission' }}
                    </h3>
                    <button @click="$wire.closeForm()"
                        class="text-gray-400 hover:text-gray-600 transition-colors cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="flex-1 overflow-y-auto scrollbar-thin">
                    <form wire:submit.prevent="save" class="p-6 space-y-6">
                        <!-- Permission Name Input -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-heading mb-2">
                                Permission Name <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                                <input type="text" id="name" wire:model.live="name" placeholder="e.g., create-users, edit-posts"
                                    class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white text-body placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                                    @error('name') aria-describedby="name-error" @enderror>
                                @error('name')
                                    <p id="name-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                <svg class="inline h-3.5 w-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                                Use lowercase letters with hyphens (kebab-case)
                            </p>
                        </div>

                        <!-- Info Box -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="h-5 w-5 text-blue-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                                <div class="text-sm text-blue-800">
                                    <p class="font-semibold mb-1">Permission Naming Guidelines:</p>
                                    <ul class="list-disc list-inside space-y-1 ml-2">
                                        <li>Use descriptive, action-based names</li>
                                        <li>Format: <code class="bg-blue-100 px-1 rounded">action-resource</code></li>
                                        <li>Examples: view-reports, manage-users, delete-posts</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button inside the form -->
                        <div class="flex justify-end gap-3 pt-4">
                            <button @click="$wire.closeForm()"
                                class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 rounded-lg transition-colors cursor-pointer">
                                Cancel
                            </button>
                            <button type="submit"
                                wire:loading.attr="disabled"
                                class="px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 disabled:bg-indigo-400 rounded-lg transition-colors flex items-center gap-2 cursor-pointer">
                                <span wire:loading.remove>{{ $isEditing ? 'Update Permission' : 'Create Permission' }}</span>
                                <span wire:loading>
                                    <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Saving...
                                </span>
                            </button>
                        </div>

                    </form>
                </div>

                <!-- Modal Footer - Remove duplicate buttons -->
                <div class="sticky bottom-0 px-6 py-4 border-t border-gray-200 bg-white flex justify-end gap-3 z-10 flex-shrink-0">
                    <!-- Buttons moved inside the form above -->
                </div>
            </div>
        </div>
    @endif

    <!-- Success/Error Messages -->
    @if (session('message'))
        <div class="fixed bottom-4 right-4 bg-green-50 border border-green-200 rounded-lg p-4 shadow-lg">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm font-medium text-green-800">{{ session('message') }}</p>
            </div>
        </div>
    @endif

    <!-- Additional Info -->
    <div class="mt-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
        <h3 class="text-sm font-semibold text-gray-700 mb-2">What are permissions?</h3>
        <p class="text-xs text-gray-600">
            Permissions are granular access controls that define what actions users can perform within the system.
            They can be assigned to roles, which are then assigned to users for efficient access management.
        </p>
    </div>
</div>

@livewireScripts

<script>
    document.addEventListener('livewire:navigated', () => {
        // Handler for Livewire navigation if needed
    });
</script>