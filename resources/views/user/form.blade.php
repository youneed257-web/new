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
                                    @foreach ($users as $user)
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
                                                {{ $user->getRoleNames()->join(', ') }}
                                            </td>
                                            <td class="px-6 py-4">
                                               ****************
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                               <div class="flex items-center justify-end gap-2">
                                            <button class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                                                Edit
                                            </button>
                                            <button class="text-red-600 hover:text-red-800 font-medium text-sm transition-colors">
                                                Delete
                                            </button>
                                        </div>
                                            </td>
                                        </tr>
                                     @endforeach
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
