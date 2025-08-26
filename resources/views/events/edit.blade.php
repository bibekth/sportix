<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('events.index') }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                            Back to Events
                        </a>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Edit Event</h1>
                            <p class="text-sm text-gray-600 mt-1">Update event information and team details</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div
                            class="flex items-center space-x-2 px-4 py-2 bg-amber-50 rounded-lg border border-amber-200">
                            <svg class="w-5 h-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm font-medium text-amber-700">Editing Mode</span>
                        </div>
                        <a href="{{ route('events.show', $event->id) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-indigo-700 bg-indigo-50 border border-indigo-200 rounded-lg shadow-sm hover:bg-indigo-100 hover:border-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            View Event
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Event Details Card -->
                <div class="bg-white shadow-xl rounded-xl border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Event Information
                                </h2>
                                <p class="text-sm text-gray-600 mt-1">Update basic details about the sporting event</p>
                            </div>
                            <div class="text-sm text-gray-500">
                                ID: #{{ str_pad($event->id, 4, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Event Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Event Title
                                </span>
                            </label>
                            <input type="text" name="title" id="title"
                                value="{{ old('title', $event->title) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('title') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="e.g., Championship Final Match">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Event Date and Time -->
                        <div>
                            <label for="starts_on" class="block text-sm font-medium text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Event Date & Time <span class="text-red-500">*</span>
                                </span>
                            </label>
                            <input type="datetime-local" name="starts_on" id="starts_on"
                                value="{{ old('starts_on', $event->starts_on ? \Carbon\Carbon::parse($event->starts_on)->format('Y-m-d\TH:i') : '') }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('starts_on') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                            @error('starts_on')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Ticket Price
                                </span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" name="price" id="price" min="0" step="0.01" value="{{ old('price', $event->price) }}"
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="0.00">
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Leave empty or set to 0 for free events</p>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Event Status
                                </span>
                            </label>
                            <select name="status" id="status"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('status') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                                <option value="1" {{ old('status', $event->status) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ old('status', $event->status) == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Teams Information Card -->
                <div class="bg-white shadow-xl rounded-xl border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Teams Information
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Update the competing teams for this event</p>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Team One (Home Team) -->
                            <div class="space-y-6">
                                <div class="flex items-center space-x-2 mb-4">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <span class="text-blue-600 font-semibold text-sm">1</span>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900">Home Team</h3>
                                </div>

                                <!-- Team One Name -->
                                <div>
                                    <label for="team_one" class="block text-sm font-medium text-gray-700 mb-2">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Team Name <span class="text-red-500">*</span>
                                        </span>
                                    </label>
                                    <input type="text" name="team_one" id="team_one"
                                        value="{{ old('team_one', $event->team_one) }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('team_one') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                        placeholder="e.g., Manchester United">
                                    @error('team_one')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Team One Logo -->
                                <div>
                                    <label for="team_one_logo" class="block text-sm font-medium text-gray-700 mb-2">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Team Logo URL <span class="text-red-500">*</span>
                                        </span>
                                    </label>
                                    <input type="url" name="team_one_logo" id="team_one_logo"
                                        value="{{ old('team_one_logo', $event->team_one_logo) }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('team_one_logo') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                        placeholder="https://example.com/team-logo.png">
                                    @error('team_one_logo')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Team One Current Logo -->
                                @if ($event->team_one_logo)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Current
                                            Logo</label>
                                        <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                            <img src="{{ $event->team_one_logo }}" alt="{{ $event->team_one }}"
                                                width="180" height="180"
                                                class="w-12 h-12 rounded-full object-cover"
                                                onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMjQiIGN5PSIyNCIgcj0iMjQiIGZpbGw9IiNGM0Y0RjYiLz4KPHN2ZyB4PSIxMiIgeT0iMTIiIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0iIzlDQTNCMCI+CjxwYXRoIGQ9Ik0xMiAxMmE0IDQgMCAxMTAgOCA0IDQgMCAwMTAtOHpNMTQgMjBoNGEyIDIgMCAwMTIgMnYyYTIgMiAwIDAxLTIgMkg4YTIgMiAwIDAxLTItMnYtMmEyIDIgMCAwMTItMmg0eiIvPgo8L3N2Zz4KPC9zdmc+Cg=='">
                                            <span class="text-sm text-gray-600">{{ $event->team_one }}</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Team One Logo Preview -->
                                <div class="hidden" id="team_one_preview">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">New Logo
                                        Preview</label>
                                    <div
                                        class="flex items-center space-x-3 p-3 bg-blue-50 rounded-lg border border-blue-200">
                                        <img id="team_one_preview_img" src="" alt="Team One Logo"
                                            width="180" height="180"
                                            class="w-12 h-12 rounded-full object-cover">
                                        <span class="text-sm text-blue-600">Updated logo preview</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Team Two (Away Team) -->
                            <div class="space-y-6">
                                <div class="flex items-center space-x-2 mb-4">
                                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                        <span class="text-red-600 font-semibold text-sm">2</span>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900">Away Team</h3>
                                </div>

                                <!-- Team Two Name -->
                                <div>
                                    <label for="team_two" class="block text-sm font-medium text-gray-700 mb-2">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Team Name <span class="text-red-500">*</span>
                                        </span>
                                    </label>
                                    <input type="text" name="team_two" id="team_two"
                                        value="{{ old('team_two', $event->team_two) }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('team_two') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                        placeholder="e.g., Liverpool FC">
                                    @error('team_two')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Team Two Logo -->
                                <div>
                                    <label for="team_two_logo" class="block text-sm font-medium text-gray-700 mb-2">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Team Logo URL <span class="text-red-500">*</span>
                                        </span>
                                    </label>
                                    <input type="url" name="team_two_logo" id="team_two_logo"
                                        value="{{ old('team_two_logo', $event->team_two_logo) }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('team_two_logo') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                        placeholder="https://example.com/team-logo.png">
                                    @error('team_two_logo')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Team Two Current Logo -->
                                @if ($event->team_two_logo)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Current
                                            Logo</label>
                                        <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                            <img src="{{ $event->team_two_logo }}" alt="{{ $event->team_two }}"
                                                width="180" height="180"
                                                class="w-12 h-12 rounded-full object-cover"
                                                onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMjQiIGN5PSIyNCIgcj0iMjQiIGZpbGw9IiNGM0Y0RjYiLz4KPHN2ZyB4PSIxMiIgeT0iMTIiIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0iIzlDQTNCMCI+CjxwYXRoIGQ9Ik0xMiAxMmE0IDQgMCAxMTAgOCA0IDQgMCAwMTAtOHpNMTQgMjBoNGEyIDIgMCAwMTIgMnYyYTIgMiAwIDAxLTIgMkg4YTIgMiAwIDAxLTItMnYtMmEyIDIgMCAwMTItMmg0eiIvPgo8L3N2Zz4KPC9zdmc+Cg=='">
                                            <span class="text-sm text-gray-600">{{ $event->team_two }}</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Team Two Logo Preview -->
                                <div class="hidden" id="team_two_preview">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">New Logo
                                        Preview</label>
                                    <div
                                        class="flex items-center space-x-3 p-3 bg-red-50 rounded-lg border border-red-200">
                                        <img id="team_two_preview_img" src="" alt="Team Two Logo"
                                            width="180" height="180"
                                            class="w-12 h-12 rounded-full object-cover">
                                        <span class="text-sm text-red-600">Updated logo preview</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Current Match Preview -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 text-center">Current Match Setup
                                </h3>
                                <div class="flex items-center justify-center space-x-8">
                                    <div class="text-center">
                                        <div class="w-16 h-16 mb-2 flex items-center justify-center mx-auto">
                                            <img src="{{ $event->team_one_logo }}" alt="{{ $event->team_one }}"
                                                class="w-16 h-16 rounded-full object-cover"
                                                onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMzIiIGN5PSIzMiIgcj0iMzIiIGZpbGw9IiNGM0Y0RjYiLz4KPHN2ZyB4PSIxNiIgeT0iMTYiIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgZmlsbD0iIzlDQTNCMCI+CjxwYXRoIGQ9Ik0xNiAxNmE4IDggMCAxMTAgMTYgOCA4IDAgMDEwLTE2ek0yMCAyOGg4YTQgNCAwIDAxNCA0djRhNCA0IDAgMDEtNCA0SDE2YTQgNCAwIDAxLTQtNHYtNGE0IDQgMCAwMTQtNGg0eiIvPgo8L3N2Zz4KPC9zdmc+Cg=='">
                                        </div>
                                        <span class="text-sm font-medium text-gray-900"
                                            id="current_team_one">{{ $event->team_one }}</span>
                                        <div class="text-xs text-blue-600 mt-1">Home</div>
                                    </div>
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="w-16 h-16 mb-2 flex items-center justify-center mx-auto">
                                            <img src="{{ $event->team_two_logo }}" alt="{{ $event->team_two }}"
                                                class="w-16 h-16 rounded-full object-cover"
                                                onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMzIiIGN5PSIzMiIgcj0iMzIiIGZpbGw9IiNGM0Y0RjYiLz4KPHN2ZyB4PSIxNiIgeT0iMTYiIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgZmlsbD0iIzlDQTNCMCI+CjxwYXRoIGQ9Ik0xNiAxNmE4IDggMCAxMTAgMTYgOCA4IDAgMDEwLTE2ek0yMCAyOGg4YTQgNCAwIDAxNCA0djRhNCA0IDAgMDEtNCA0SDE2YTQgNCAwIDAxLTQtNHYtNGE0IDQgMCAwMTQtNGg0eiIvPgo8L3N2Zz4KPC9zdmc+Cg=='">
                                        </div>
                                        <span class="text-sm font-medium text-gray-900"
                                            id="current_team_two">{{ $event->team_two }}</span>
                                        <div class="text-xs text-gray-600 mt-1">Away</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Updated Match Preview -->
                        <div id="updated_preview" class="mt-4 pt-6 border-t border-gray-200 hidden">
                            <div
                                class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-200">
                                <h3
                                    class="text-lg font-semibold text-gray-900 mb-4 text-center flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Updated Match Preview
                                </h3>
                                <div class="flex items-center justify-center space-x-8" id="match_preview">
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-gray-200 rounded-full mb-2 flex items-center justify-center mx-auto"
                                            id="preview_team_one_logo">
                                            <span class="text-gray-500 text-xs">Logo</span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900"
                                            id="preview_team_one">{{ $event->team_one }}</span>
                                        <div class="text-xs text-blue-600 mt-1">Home</div>
                                    </div>
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-gray-200 rounded-full mb-2 flex items-center justify-center mx-auto"
                                            id="preview_team_two_logo">
                                            <span class="text-gray-500 text-xs">Logo</span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900"
                                            id="preview_team_two">{{ $event->team_two }}</span>
                                        <div class="text-xs text-gray-600 mt-1">Away</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Change History Card -->
                <div class="bg-white shadow-xl rounded-xl border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Event History
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Track changes and modifications</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 px-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Event Created</p>
                                        <p class="text-xs text-gray-500">Initial event setup</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-900">{{ $event->created_at->format('M d, Y') }}</p>
                                    <p class="text-xs text-gray-500">{{ $event->created_at->format('h:i A') }}</p>
                                </div>
                            </div>

                            <div class="flex justify-between items-center py-3 px-4 bg-blue-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Last Updated</p>
                                        <p class="text-xs text-gray-500">Most recent modification</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-900">{{ $event->updated_at->format('M d, Y') }}</p>
                                    <p class="text-xs text-gray-500">{{ $event->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6">
                    <a href="{{ route('events.show', $event->id) }}"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-1 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        View Event
                    </a>
                    <a href="{{ route('events.index') }}"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-1 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-1 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let hasChanges = false;

        // Logo preview functionality
        document.getElementById('team_one_logo').addEventListener('input', function() {
            const url = this.value;
            const originalUrl = '{{ $event->team_one_logo }}';
            const preview = document.getElementById('team_one_preview');
            const img = document.getElementById('team_one_preview_img');
            const updatedPreview = document.getElementById('updated_preview');
            const previewLogo = document.getElementById('preview_team_one_logo');

            if (url && url !== originalUrl) {
                hasChanges = true;
                img.src = url;
                img.onload = function() {
                    preview.classList.remove('hidden');
                    updatedPreview.classList.remove('hidden');
                    previewLogo.innerHTML =
                        `<img src="${url}" alt="Team One" class="w-16 h-16 rounded-full object-cover">`;
                };
                img.onerror = function() {
                    preview.classList.add('hidden');
                    previewLogo.innerHTML = '<span class="text-gray-500 text-xs">Logo</span>';
                };
            } else {
                preview.classList.add('hidden');
                previewLogo.innerHTML = '<span class="text-gray-500 text-xs">Logo</span>';
                checkForChanges();
            }
        });

        document.getElementById('team_two_logo').addEventListener('input', function() {
            const url = this.value;
            const originalUrl = '{{ $event->team_two_logo }}';
            const preview = document.getElementById('team_two_preview');
            const img = document.getElementById('team_two_preview_img');
            const updatedPreview = document.getElementById('updated_preview');
            const previewLogo = document.getElementById('preview_team_two_logo');

            if (url && url !== originalUrl) {
                hasChanges = true;
                img.src = url;
                img.onload = function() {
                    preview.classList.remove('hidden');
                    updatedPreview.classList.remove('hidden');
                    previewLogo.innerHTML =
                        `<img src="${url}" alt="Team Two" class="w-16 h-16 rounded-full object-cover">`;
                };
                img.onerror = function() {
                    preview.classList.add('hidden');
                    previewLogo.innerHTML = '<span class="text-gray-500 text-xs">Logo</span>';
                };
            } else {
                preview.classList.add('hidden');
                previewLogo.innerHTML = '<span class="text-gray-500 text-xs">Logo</span>';
                checkForChanges();
            }
        });

        // Team name preview and change detection
        document.getElementById('team_one').addEventListener('input', function() {
            const name = this.value || 'Team One';
            const originalName = '{{ $event->team_one }}';
            document.getElementById('preview_team_one').textContent = name;

            if (name !== originalName) {
                hasChanges = true;
                document.getElementById('updated_preview').classList.remove('hidden');
            } else {
                checkForChanges();
            }
        });

        document.getElementById('team_two').addEventListener('input', function() {
            const name = this.value || 'Team Two';
            const originalName = '{{ $event->team_two }}';
            document.getElementById('preview_team_two').textContent = name;

            if (name !== originalName) {
                hasChanges = true;
                document.getElementById('updated_preview').classList.remove('hidden');
            } else {
                checkForChanges();
            }
        });

        // Other field change detection
        document.getElementById('title').addEventListener('input', function() {
            const originalTitle = '{{ $event->title }}';
            if (this.value !== originalTitle) {
                hasChanges = true;
            } else {
                checkForChanges();
            }
        });

        document.getElementById('starts_on').addEventListener('input', function() {
            const originalDate =
                '{{ $event->starts_on ? \Carbon\Carbon::parse($event->starts_on)->format('Y-m-d\TH:i') : '' }}';
            if (this.value !== originalDate) {
                hasChanges = true;
            } else {
                checkForChanges();
            }
        });

        document.getElementById('status').addEventListener('change', function() {
            const originalStatus = '{{ $event->status }}';
            if (this.value !== originalStatus) {
                hasChanges = true;
            } else {
                checkForChanges();
            }
        });

        function checkForChanges() {
            const title = document.getElementById('title').value;
            const originalTitle = '{{ $event->title }}';
            const startsOn = document.getElementById('starts_on').value;
            const originalStartsOn =
                '{{ $event->starts_on ? \Carbon\Carbon::parse($event->starts_on)->format('Y-m-d\TH:i') : '' }}';
            const status = document.getElementById('status').value;
            const originalStatus = '{{ $event->status }}';
            const teamOne = document.getElementById('team_one').value;
            const originalTeamOne = '{{ $event->team_one }}';
            const teamTwo = document.getElementById('team_two').value;
            const originalTeamTwo = '{{ $event->team_two }}';
            const teamOneLogo = document.getElementById('team_one_logo').value;
            const originalTeamOneLogo = '{{ $event->team_one_logo }}';
            const teamTwoLogo = document.getElementById('team_two_logo').value;
            const originalTeamTwoLogo = '{{ $event->team_two_logo }}';

            hasChanges = (
                title !== originalTitle ||
                startsOn !== originalStartsOn ||
                status !== originalStatus ||
                teamOne !== originalTeamOne ||
                teamTwo !== originalTeamTwo ||
                teamOneLogo !== originalTeamOneLogo ||
                teamTwoLogo !== originalTeamTwoLogo
            );

            if (!hasChanges) {
                document.getElementById('updated_preview').classList.add('hidden');
            }
        }

        // Warn user about unsaved changes
        window.addEventListener('beforeunload', function(e) {
            if (hasChanges) {
                const confirmationMessage = 'You have unsaved changes. Are you sure you want to leave?';
                e.returnValue = confirmationMessage;
                return confirmationMessage;
            }
        });

        // Initialize preview with current data
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('preview_team_one').textContent = '{{ $event->team_one }}';
            document.getElementById('preview_team_two').textContent = '{{ $event->team_two }}';
        });
    </script>
</x-app-layout>
