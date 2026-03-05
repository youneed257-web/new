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
        <p class="mt"></p><br>
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
                        <h2 class="text-xl font-semibold text-heading mb-6">Create New User</h2>

                        <form action="{{ route('user.stores') }}" method="POST">
                            @csrf

                            <!-- Role Name Input -->
                            <div class="mb-6">
                                <label for="name" class="block text-sm font-medium text-heading mb-2">
                                    Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                    placeholder="Enter User name"
                                    class="w-full px-4 py-2.5 border border-default-medium rounded-xs bg-neutral-secondary-medium text-body placeholder-gray-400 focus:ring-2 focus:ring-brand-soft focus:border-brand-soft transition-colors">
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-heading mb-3">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="email" name="email" required value="{{ old('email') }}"
                                    placeholder="Enter User email"
                                    class="w-full px-4 py-2.5 border border-default-medium rounded-xs bg-neutral-secondary-medium text-body placeholder-gray-400 focus:ring-2 focus:ring-brand-soft focus:border-brand-soft transition-colors">
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-heading mb-3">
                                    Role <span class="text-red-500">*</span>
                                </label>
                                <select name="role" id="role" required
                                    class="w-full px-4 py-2.5 border border-default-medium rounded-xs bg-neutral-secondary-medium text-body placeholder-gray-400 focus:ring-2 focus:ring-brand-soft focus:border-brand-soft transition-colors">
                                    <option value="" disabled selected>Select a role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-heading mb-3">
                                    Password <span class="text-red-500">*</span>
                                </label>
                                <input type="password" id="password" name="password" required
                                    placeholder="Enter User password"
                                    class="w-full px-4 py-2.5 border border-default-medium rounded-xs bg-neutral-secondary-medium text-body placeholder-gray-400 focus:ring-2 focus:ring-brand-soft focus:border-brand-soft transition-colors">
                            </div>
                                <button type="submit"
                                    class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xs shadow-sm transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Create User
                                </button>
                        </form>
                    </div>
                </div>

                <!-- Roles Table - Right Side -->
                <div class="lg:col-span-2">
                    <div class="bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                        <div class="px-6 py-4 border-b border-default">
                            <h2 class="text-xl font-semibold text-heading">Manage Users</h2>
                            <p class="text-sm text-body mt-1">Manage all users and their roles</p>
                        </div>

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-body">
                                <thead class="text-xs text-body bg-neutral-secondary-soft border-b border-default">
                                    <tr>
                                        <th class="px-6 py-3 font-semibold uppercase tracking-wide">ID</th>
                                        <th class="px-6 py-3 font-semibold uppercase tracking-wide">Name</th>
                                        <th class="px-6 py-3 font-semibold uppercase tracking-wide">E-mail</th>
                                        <th class="px-6 py-3 font-semibold uppercase tracking-wide">Role</th>
                                        <th class="px-6 py-3 font-semibold uppercase tracking-wide">Password</th>
                                        <th class="px-6 py-3 font-semibold uppercase tracking-wide text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @forelse ($users as $user)
                                        <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                            <td class="px-6 py-4 font-medium whitespace-nowrap">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-6 py-4 font-semibold">
                                                {{ $user->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $user->email }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    {{ $user->getRoleNames()->join(', ') }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                ****************
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <div class="flex items-center justify-end gap-2">
                                                    {{-- Edit Button --}}
                                                    <button
                                                        onclick="openEditUserModal({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ $user->email }}', '{{ $user->roles->first()->id ?? '' }}')"
                                                        class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                                                        Edit
                                                    </button>

                                                    {{-- Delete Button --}}
                                                    <form action="{{ route('user.delete', $user->id) }}" method="POST"
                                                        class="inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-800 font-medium text-sm transition-colors">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                                No users found. Create your first user above.
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
        {{-- Edit User Modal --}}
        <div id="editUserModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit User
                    </h3>
                    <button type="button" onclick="closeEditUserModal()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <form id="editUserForm" method="POST" class="p-6">
                    @csrf
                    @method('PUT')

                    <!-- Name Input -->
                    <div class="mb-4">
                        <label for="edit_user_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="edit_user_name" name="name" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Email Input -->
                    <div class="mb-4">
                        <label for="edit_user_email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="edit_user_email" name="email" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Role Select -->
                    <div class="mb-4">
                        <label for="edit_user_role" class="block text-sm font-medium text-gray-700 mb-2">
                            Role <span class="text-red-500">*</span>
                        </label>
                        <select id="edit_user_role" name="role" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled>Select a role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-4">
                        <label for="edit_user_password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password (Leave blank to keep current)
                        </label>
                        <input type="password" id="edit_user_password" name="password"
                            placeholder="Enter new password or leave blank"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <p class="text-xs text-gray-500 mt-2 mb-4">Leave blank to keep current password</p>
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" onclick="closeEditUserModal()"
                            class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors border border-gray-200">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- JavaScript for Edit User Modal --}}
        <script>
            // Open Edit Modal
            function openEditUserModal(userId, userName, userEmail, userRole) {
                // Set form action URL
                document.getElementById('editUserForm').action = `/user/update/${userId}`;

                // Fill form fields
                document.getElementById('edit_user_name').value = userName;
                document.getElementById('edit_user_email').value = userEmail;
                document.getElementById('edit_user_role').value = userRole;
                document.getElementById('edit_user_password').value = '';

                // Show modal
                document.getElementById('editUserModal').classList.remove('hidden');
            }

            // Close Edit Modal
            function closeEditUserModal() {
                document.getElementById('editUserModal').classList.add('hidden');
            }

            // Close modal when clicking outside
            document.getElementById('editUserModal')?.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeEditUserModal();
                }
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeEditUserModal();
                }
            });
        </script>
    @endsection
</body>

</html>
