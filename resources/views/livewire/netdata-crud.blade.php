<div class="container mx-auto px-4 py-8 max-w-4xl ">
    @livewireStyles
    <style>
        /* custom scrollbar from permission view */
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
            <div
                class="h-12 w-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-lg flex items-center justify-center mr-4 shadow-md">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-heading">Data Management</h1>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-500">
                Total Line: <span class="font-semibold text-gray-700">{{ $netdata->total() }}</span>
            </div>
            <button @click="$wire.createNew()"
                class="px-6 py-2.5 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white bg-brand font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New ROOM
                </span>
            </button>
        </div>
        {{-- search --}}
        <div class="mt-4">
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                </div>
                <input type="search" id="search" wire:model.live="search"
                    class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                    placeholder="Search room, ISP, IP address..." />
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-heading">All Net Data</h2>
            <p class="text-sm text-gray-600 mt-1">Manage network information records</p>
        </div>

        @if ($netdata->total() > 0)
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-xs text-gray-700 bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">#</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">Room</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">ISP</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">DIA IP</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">Bandwidth</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">IP Address</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">Gateway</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">IP Public</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide">Created</th>
                            <th class="px-6 py-3 font-semibold uppercase tracking-wide text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($netdata as $item)
                            <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $item->room }}</td>
                                <td class="px-6 py-4">{{ $item->isp }}</td>
                                <td class="px-6 py-4">{{ $item->dia_ip }}</td>
                                <td class="px-6 py-4">{{ $item->bandwidth }}</td>
                                <td class="px-6 py-4">{{ $item->ip_address }}</td>
                                <td class="px-6 py-4">{{ $item->gateway }}</td>
                                <td class="px-6 py-4">{{ $item->ip_public }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $item->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-3">
                                        <button @click="$wire.edit({{ $item->id }})"
                                            class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                                            Edit
                                        </button>
                                        <button @click="$wire.delete({{ $item->id }})"
                                            onclick="return confirm('Are you sure you want to delete this record?');"
                                            class="text-red-600 hover:text-red-800 font-medium text-sm transition-colors">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Showing <span class="font-semibold">{{ $netdata->firstItem() }}</span> to <span
                        class="font-semibold">{{ $netdata->lastItem() }}</span> of <span
                        class="font-semibold">{{ $netdata->total() }}</span> results
                </div>
                {{ $netdata->links() }}
            </div>
        @endif
    </div>

    <!-- Modal Form -->
    @if ($showForm)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
            @click.self="$wire.closeForm()">
            <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] flex flex-col">
                <div
                    class="sticky top-0 px-6 py-4 border-b border-gray-200 bg-white flex justify-between items-center z-10 flex-shrink-0">
                    <h3 class="text-xl font-semibold text-heading">
                        {{ $isEditing ? 'Edit Entry' : 'Create New ROOM' }}
                    </h3>
                    <button @click="$wire.closeForm()"
                        class="text-gray-400 hover:text-gray-600 transition-colors cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex-1 overflow-y-auto scrollbar-thin">
                    <form wire:submit.prevent="save" class="p-6 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="room" class="block text-sm font-semibold text-heading mb-2">Room <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="room" wire:model.live="room"
                                    class="w-full pl-3 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"
                                    @error('room') aria-describedby="room-error" @enderror>
                                @error('room')
                                    <p id="room-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="isp" class="block text-sm font-semibold text-heading mb-2">ISP <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="isp" wire:model.live="isp"
                                    class="w-full pl-3 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"
                                    @error('isp') aria-describedby="isp-error" @enderror>
                                @error('isp')
                                    <p id="isp-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="dia_ip" class="block text-sm font-semibold text-heading mb-2">DIA IP
                                    <span class="text-red-500">*</span></label>
                                <input type="text" id="dia_ip" wire:model.live="dia_ip"
                                    class="w-full pl-3 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"
                                    @error('dia_ip') aria-describedby="dia_ip-error" @enderror>
                                @error('dia_ip')
                                    <p id="dia_ip-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="bandwidth"
                                    class="block text-sm font-semibold text-heading mb-2">Bandwidth</label>
                                <input type="text" id="bandwidth" wire:model.live="bandwidth"
                                    class="w-full pl-3 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                                @error('bandwidth')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="ip_address" class="block text-sm font-semibold text-heading mb-2">IP
                                    Address</label>
                                <input type="text" id="ip_address" wire:model.live="ip_address"
                                    class="w-full pl-3 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                                @error('ip_address')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="gateway"
                                    class="block text-sm font-semibold text-heading mb-2">Gateway</label>
                                <input type="text" id="gateway" wire:model.live="gateway"
                                    class="w-full pl-3 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                                @error('gateway')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="ip_public" class="block text-sm font-semibold text-heading mb-2">IP
                                    Public</label>
                                <input type="text" id="ip_public" wire:model.live="ip_public"
                                    class="w-full pl-3 pr-4 py-2.5 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                                @error('ip_public')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 pt-4">
                            <button @click="$wire.closeForm()" type="button"
                                class="px-5 py-2.5 text-sm font-medium text-white bg-warning box-border border border-transparent hover:bg-warning-strong border border-gray-300 rounded-lg transition-colors cursor-pointer">Cancel</button>
                            <button type="submit" wire:loading.attr="disabled"
                                class="px-5 py-2.5 text-sm font-medium text-white bg-success box-border border border-transparent hover:bg-success-strong disabled:bg-green-400 rounded-lg transition-colors flex items-center gap-2 cursor-pointer">
                                <span wire:loading.remove>{{ $isEditing ? 'Update' : 'Create ROOM' }}</span>
                                <span wire:loading>Saving...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
