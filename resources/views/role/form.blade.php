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
                <h2 class="text-xl font-semibold text-heading mb-6">Create New Role</h2>
                
                <form action="{{ route('role.stores') }}" method="POST">
                    @csrf
                    
                    <!-- Role Name Input -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-heading mb-2">
                            Role Name <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="role" 
                            required 
                            value="{{ old('role') }}"
                            placeholder="Enter role name"
                            class="w-full px-4 py-2.5 border border-default-medium rounded-xs bg-neutral-secondary-medium text-body placeholder-gray-400 focus:ring-2 focus:ring-brand-soft focus:border-brand-soft transition-colors"
                        >
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
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input 
                                            type="checkbox" 
                                            name="permission[]" 
                                            value="{{ $permission->id }}" 
                                            id="permission-{{ $permission->id }}"
                                            class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft cursor-pointer"
                                        >
                                    </div>
                                    <label 
                                        for="permission-{{ $permission->id }}"
                                        class="ml-3 text-sm font-medium text-body cursor-pointer select-none"
                                    >
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('permission')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xs shadow-sm transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Create Role
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
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                                    {{ $permission->name }}
                                                </span>
                                            @empty
                                                <span class="text-xs text-gray-400 italic">No permissions</span>
                                            @endforelse
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap">
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
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
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
            </div>
        </div>
    </div>
</div>
@endsection
    
</body>
</html>