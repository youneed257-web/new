<div class="container mx-auto px-4 py-8 max-w-7xl">
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

        /* Custom scrollbar colors for different variants */
        .scrollbar-thumb-gray-300::-webkit-scrollbar-thumb {
            background-color: #d1d5db;
        }

        .scrollbar-thumb-blue-300::-webkit-scrollbar-thumb {
            background-color: #93c5fd;
        }

        .scrollbar-track-gray-100::-webkit-scrollbar-track {
            background-color: #f3f4f6;
        }

        .scrollbar-track-blue-100::-webkit-scrollbar-track {
            background-color: #eff6ff;
        }

        /* Modal specific styles */
        .modal-scroll {
            max-height: calc(90vh - 120px);
            /* Account for header and footer */
        }

        /* Ensure modal content doesn't overflow */
        .modal-content {
            min-height: 0;
            flex: 1;
        }
    </style>
    <!-- Page Header -->
    <p class="mt-10"></p>
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-heading mb-2">Role Management</h1>
            </div>
            <button @click="$wire.createNewRole()"
                class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New Role
                </span>
            </button>
        </div>
    </div>

    <!-- Roles Table -->
    <div class="bg-white shadow-xs rounded-lg border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-heading">All Roles</h2>
        </div>

        @if ($roles->count() > 0)
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-xs text-gray-700 bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">ID</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">Role Name</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">Permissions</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($roles as $role)
                            <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-semibold">{{ $role->name }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        @forelse ($role->permissions as $permission)
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                                {{ $permission->name }}
                                            </span>
                                        @empty
                                            <span class="text-xs text-gray-400 italic">No permissions</span>
                                        @endforelse
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-3">
                                        <button @click="$wire.editRole({{ $role->id }})"
                                            class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                                            Edit
                                        </button>
                                        <button @click="$wire.deleteRole({{ $role->id }})"
                                            onclick="return confirm('Are you sure you want to delete this role?')"
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
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <p class="text-gray-500 font-medium">No roles found</p>
                                        <p class="text-gray-400 text-sm mt-1">Create your first role to get started</p>
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
    @if ($showForm)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
            @click.self="$wire.closeForm()">
            <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[50vh] flex flex-col">

                <!-- Modal Header - Sticky top -->
                <div
                    class="sticky top-0 px-6 py-4 border-b border-gray-200 bg-white flex justify-between items-center z-10 flex-shrink-0 rounded-t-lg">
                    <h3 class="text-xl font-semibold text-heading">
                        {{ $isEditing ? 'Edit Role' : 'Create New Role' }}
                    </h3>
                    <button @click="$wire.closeForm()"
                        class="text-gray-400 hover:text-gray-600 transition-colors cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- ✅ Modal Body - Scrollable -->
                <div class="flex-1 overflow-y-auto min-h-0">
                    <form wire:submit.prevent="save" class="p-6 space-y-6">

                        <!-- Role Name Input -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-heading mb-2">
                                Role Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" wire:model.live="name" placeholder="Enter role name"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-body placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                @error('name') aria-describedby="name-error" @enderror>
                            @error('name')
                                <p id="name-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Permissions Selection -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Permissions</label>
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-3 max-h-60 overflow-y-auto p-2 border border-gray-200 rounded-lg">
                                @foreach ($permissions as $permission)
                                    <div class="flex items-center">
                                        <input wire:click="togglePermission({{ $permission->id }})"
                                            id="permission-{{ $permission->id }}" type="checkbox"
                                            @checked(in_array($permission->id, $selectedPermissions))
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                        <label for="permission-{{ $permission->id }}"
                                            class="ml-2 text-sm font-medium text-gray-900 cursor-pointer">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Selected Permissions Summary -->
                        @if (count($selectedPermissions) > 0)
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <p class="text-sm font-medium text-blue-900 mb-2">
                                    Selected Permissions ({{ count($selectedPermissions) }})
                                </p>
                                <div class="flex flex-wrap gap-2 max-h-32 overflow-y-auto pr-2">
                                    @foreach ($permissions->whereIn('id', $selectedPermissions) as $permission)
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-300 flex-shrink-0">
                                            {{ $permission->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Submit Button inside the form -->
                        <div class="flex justify-end gap-3 pt-4">
                            <button @click="$wire.closeForm()"
                                class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 rounded-lg transition-colors cursor-pointer">
                                Cancel
                            </button>
                            <button type="submit" wire:loading.attr="disabled"
                                class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 rounded-lg transition-colors flex items-center gap-2 cursor-pointer">
                                <span wire:loading.remove>{{ $isEditing ? 'Update Role' : 'Create Role' }}</span>
                                <span wire:loading>
                                    <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Saving...
                                </span>
                            </button>
                        </div>

                    </form>
                </div>

                <!-- Modal Footer - Remove duplicate buttons -->
                <div
                    class="sticky bottom-0 px-6 py-4 border-t border-gray-200 bg-white flex justify-end gap-3 z-10 flex-shrink-0 rounded-b-lg">
                    <!-- Buttons moved inside the form above -->
                </div>

            </div>
        </div>
    @endif

    <!-- Success/Error Messages -->
 @if (session('message'))
<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-4"
    class="fixed top-4 left-1/2 -translate-x-1/2 z-50 min-w-64">

    <div class="flex items-center gap-3 bg-green-50 border border-green-200 rounded-lg px-4 py-3 shadow-lg">
        <!-- Icon -->
        <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <!-- Message -->
        <p class="text-sm font-medium text-green-800 whitespace-nowrap">{{ session('message') }}</p>
        <!-- Close Button -->
        <button @click="show = false" class="ml-2 text-green-500 hover:text-green-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Progress Bar -->
    <div class="h-1 bg-green-200 rounded-b-lg overflow-hidden">
        <div class="h-full bg-green-500 rounded-b-lg"
            style="animation: shrink 3s linear forwards;"
        ></div>
    </div>
</div>

<style>
    @keyframes shrink {
        from { width: 100%; }
        to { width: 0%; }
    }
</style>
@endif
    <p class="mt-10"></p>
</div>

@livewireScripts

<script>
    document.addEventListener('livewire:navigated', () => {
        // Handler for Livewire navigation if needed
    });
</script>
