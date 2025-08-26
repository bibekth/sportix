<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-4">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('events.index') }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Back to Events
                        </a>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Create New Event</h1>
                            <p class="text-sm text-gray-600 mt-1">Add a new sports event to your calendar</p>
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <div class="flex items-center space-x-2 px-4 py-2 bg-blue-50 rounded-lg border border-blue-200">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm font-medium text-blue-700">Fill all required fields</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <form action="{{ route('events.store') }}" method="POST" class="space-y-8">
                @csrf

                <!-- Event Details Card -->
                <div class="bg-white shadow-xl rounded-xl border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Event Information
                        </h2>
                        <p class="text-sm text-gray-600 mt-1">Basic details about the sporting event</p>
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
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
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
                            <input type="datetime-local" name="starts_on" id="starts_on" value="{{ old('starts_on') }}"
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
                                    <span class="text-gray-500 sm:text-sm">Rs</span>
                                </div>
                                <input type="number" name="price" id="price" min="0" step="0.01"
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
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
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
                        <p class="text-sm text-gray-600 mt-1">Configure the competing teams for this event</p>
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
                                        value="{{ old('team_one') }}" required
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
                                        value="{{ old('team_one_logo') }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('team_one_logo') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                        placeholder="https://example.com/team-logo.png">
                                    @error('team_one_logo')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Team One Logo Preview -->
                                <div class="hidden" id="team_one_preview">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Logo Preview</label>
                                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                        <img id="team_one_preview_img" src="" alt="Team One Logo"
                                            class="w-12 h-12 rounded-full object-cover">
                                        <span class="text-sm text-gray-600">Logo preview</span>
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
                                        value="{{ old('team_two') }}" required
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
                                        value="{{ old('team_two_logo') }}" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('team_two_logo') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                        placeholder="https://example.com/team-logo.png">
                                    @error('team_two_logo')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Team Two Logo Preview -->
                                <div class="hidden" id="team_two_preview">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Logo Preview</label>
                                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                        <img id="team_two_preview_img" src="" alt="Team Two Logo"
                                            class="w-12 h-12 rounded-full object-cover">
                                        <span class="text-sm text-gray-600">Logo preview</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- VS Preview -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 text-center">Match Preview</h3>
                                <div class="flex items-center justify-center space-x-8" id="match_preview">
                                    <div class="text-center">
                                        <div
                                            class="w-16 h-16 bg-gray-200 rounded-full mb-2 flex items-center justify-center mx-auto">
                                            <span class="text-gray-500 text-xs">Logo</span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-500" id="preview_team_one">Team
                                            One</span>
                                    </div>
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold">VS</span>
                                    </div>
                                    <div class="text-center">
                                        <div
                                            class="w-16 h-16 bg-gray-200 rounded-full mb-2 flex items-center justify-center mx-auto">
                                            <span class="text-gray-500 text-xs">Logo</span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-500" id="preview_team_two">Team
                                            Two</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-6">
                    <a href="{{ route('events.index') }}"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-1 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 border border-transparent rounded-lg shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Create Event
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Logo preview functionality
        document.getElementById('team_one_logo').addEventListener('input', function() {
            const url = this.value;
            const preview = document.getElementById('team_one_preview');
            const img = document.getElementById('team_one_preview_img');
            const matchPreview = document.querySelector('#match_preview .text-center:first-child div');

            if (url) {
                img.src = url;
                img.onload = function() {
                    preview.classList.remove('hidden');
                    matchPreview.innerHTML =
                        `<img src="${url}" alt="Team One" class="w-16 h-16 rounded-full object-cover">`;
                };
                img.onerror = function() {
                    preview.classList.add('hidden');
                    matchPreview.innerHTML = '<span class="text-gray-500 text-xs">Logo</span>';
                };
            } else {
                preview.classList.add('hidden');
                matchPreview.innerHTML = '<span class="text-gray-500 text-xs">Logo</span>';
            }
        });

        document.getElementById('team_two_logo').addEventListener('input', function() {
            const url = this.value;
            const preview = document.getElementById('team_two_preview');
            const img = document.getElementById('team_two_preview_img');
            const matchPreview = document.querySelector('#match_preview .text-center:last-child div');

            if (url) {
                img.src = url;
                img.onload = function() {
                    preview.classList.remove('hidden');
                    matchPreview.innerHTML =
                        `<img src="${url}" alt="Team Two" class="w-16 h-16 rounded-full object-cover">`;
                };
                img.onerror = function() {
                    preview.classList.add('hidden');
                    matchPreview.innerHTML = '<span class="text-gray-500 text-xs">Logo</span>';
                };
            } else {
                preview.classList.add('hidden');
                matchPreview.innerHTML = '<span class="text-gray-500 text-xs">Logo</span>';
            }
        });

        // Team name preview
        document.getElementById('team_one').addEventListener('input', function() {
            const name = this.value || 'Team One';
            document.getElementById('preview_team_one').textContent = name;
        });

        document.getElementById('team_two').addEventListener('input', function() {
            const name = this.value || 'Team Two';
            document.getElementById('preview_team_two').textContent = name;
        });

        // Price preview functionality
        document.getElementById('price').addEventListener('input', function() {
            const price = parseFloat(this.value);
            const pricePreview = document.getElementById('price_preview');

            if (!price || price === 0) {
                pricePreview.innerHTML = `
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                    clip-rule="evenodd"></path>
            </svg>
            Free Event`;
                pricePreview.className =
                    'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800';
            } else {
                pricePreview.innerHTML = `
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                    clip-rule="evenodd"></path>
            </svg>
            $${price.toFixed(2)}`;
                pricePreview.className =
                    'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800';
            }
        });
    </script>
</x-app-layout>
