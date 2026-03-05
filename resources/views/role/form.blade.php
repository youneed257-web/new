<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>role</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <p class="mt-4"></p>
        <p class="mb-4"></p>
        <div class="container mx-auto px-4 py-8 max-w-7xl">
            <!-- Page Header -->
            <div class="mb-4">
                <h1 class="text-3xl font-bold text-heading mb-2">Role Management</h1>
                <p class="text-body">Create and manage user roles and permissions</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Create Role Form - Left Side -->
                <div class="lg:col-span-1">
                    <div class="bg-neutral-primary-soft shadow-xs rounded-base border border-default p-6">
                        <h2 class="text-xl font-semibold text-heading mb-6">
                            {{ isset($role) ? 'Edit Role' : 'Create New Role' }}</h2>

                        <form action="{{ isset($role) ? route('role.update', $role->id) : route('role.stores') }}"
                            method="POST">
                            @csrf
                            @if(isset($role))
                                @method('PUT')
                            @endif

                            <!-- Role Name Input -->
                            <div class="mb-6">
                                <label for="name" class="block text-sm font-medium text-heading mb-2">
                                    Role Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="role" required
                                    value="{{ old('role', isset($role) ? $role->name : '') }}" placeholder="Enter role name"
                                    class="w-full px-4 py-2.5 border border-default-medium rounded-xs bg-neutral-secondary-medium text-body placeholder-gray-400 focus:ring-2 focus:ring-brand-soft focus:border-brand-soft transition-colors">
                                @error('role')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Permissions Selection -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-heading mb-3">
                                    Permissions <span class="text-red-500">*</span>
                                </label>
                                <div class="space-y-3 max-h-96 overflow-y-auto pr-2">
                                    @foreach ($permissions as $permission)
                                        <div
                                            class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                            <!-- Left side: Checkbox and Label -->
                                            <div class="flex items-start flex-1">
                                                <div class="flex items-center h-5">
                                                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                        id="permission-{{ $permission->id }}"
                                                        {{ isset($rolePermissions) && in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                                        class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft cursor-pointer">
                                                </div>
                                                <label for="permission-{{ $permission->id }}"
                                                    class="ml-3 text-sm font-medium text-body cursor-pointer select-none">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>

                                            <!-- Right side: Edit and Delete Buttons -->
                                            <div class="flex items-center gap-2 ml-4">
                                                <!-- Edit Button -->
                                                <button type="button"
                                                    onclick="openEditPermissionModal({{ $permission->id }}, '{{ addslashes($permission->name) }}')"
                                                    class="px-3 py-1 text-xs font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded transition-colors"
                                                    title="Edit Permission">
                                                    Edit
                                                </button>

                                                <!-- Delete Button -->
                                                <form action="{{ route('permission.delete', $permission->id) }}"
                                                    method="POST" class="inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-3 py-1 text-xs font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded transition-colors"
                                                        title="Delete Permission">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('permission')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Edit Permission Modal --}}
                            <div id="editPermissionModal"
                                class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                                <div
                                    class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white">
                                    <!-- Modal Header -->
                                    <div class="flex items-center justify-between p-4 border-b">
                                        <h3 class="text-xl font-semibold text-gray-900">
                                            Edit Permission
                                        </h3>
                                        <button type="button" onclick="closeEditPermissionModal()"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Modal Body -->
                                    <form id="editPermissionForm" method="POST" class="p-6">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-4">
                                            <label for="edit_permission_name"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Permission Name <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" id="edit_permission_name" name="permission" required
                                                placeholder="Enter permission name"
                                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="flex justify-end gap-3 pt-4 border-t">
                                            <button type="button" onclick="closeEditPermissionModal()"
                                                class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                                                Update Permission
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- JavaScript for Edit Permission Modal --}}
                            <script>
                                function openEditPermissionModal(permissionId, permissionName) {
                                    // Set form action URL
                                    document.getElementById('editPermissionForm').action = `/permission/update/${permissionId}`;

                                    // Fill form field
                                    document.getElementById('edit_permission_name').value = permissionName;

                                    // Show modal
                                    document.getElementById('editPermissionModal').classList.remove('hidden');
                                }

                                function closeEditPermissionModal() {
                                    document.getElementById('editPermissionModal').classList.add('hidden');
                                }

                                // Close modal when clicking outside
                                document.getElementById('editPermissionModal')?.addEventListener('click', function(e) {
                                    if (e.target === this) {
                                        closeEditPermissionModal();
                                    }
                                });

                                // Close modal with Escape key
                                document.addEventListener('keydown', function(e) {
                                    if (e.key === 'Escape') {
                                        closeEditPermissionModal();
                                    }
                                });
                            </script>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xs shadow-sm transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                {{ isset($role) ? 'Update Role' : 'Create Role' }}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Roles Table - Right Side -->
                <div class="lg:col-span-2">
                    <div class="bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                        <div class="px-6 py-4 border-b border-default">
                            <h2 class="text-xl font-semibold text-heading">Existing Roles</h2>
                            <p class="text-sm text-body mt-1">Manage all roles and their permissions</p>
                        </div>

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-body">
                                <thead class="text-xs text-body bg-neutral-secondary-soft border-b border-default">
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
                                            <td class="px-6 py-4 font-medium whitespace-nowrap">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-6 py-4 font-semibold">
                                                {{ $role->name }}
                                            </td>
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
                                                <div class="flex items-center justify-end gap-2">
                                                    <a href=""
                                                        class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                                                        Edit
                                                    </a>
                                                    <form action="" method="POST" class="inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-800 font-medium text-sm transition-colors cursor-pointer">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-12 text-center">
                                                <div class="flex flex-col items-center justify-center">
                                                    <svg class="w-12 h-12 text-gray-300 mb-3" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                                        </path>
                                                    </svg>
                                                    <p class="text-gray-500 font-medium">No roles found</p>
                                                    <p class="text-gray-400 text-sm mt-1">Create your first role to get
                                                        started</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
