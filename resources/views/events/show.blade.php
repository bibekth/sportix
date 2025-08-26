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
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Back to Events
                        </a>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Event Details</h1>
                            <p class="text-sm text-gray-600 mt-1">View complete event information</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('events.edit', $event->id) }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-50 border border-blue-200 rounded-lg shadow-sm hover:bg-blue-100 hover:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                </path>
                            </svg>
                            Edit Event
                        </a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this event?')"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-700 bg-red-50 border border-red-200 rounded-lg shadow-sm hover:bg-red-100 hover:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1 transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 012 0v4a1 1 0 11-2 0V7zM8 15a1 1 0 112 0 1 1 0 01-2 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Delete Event
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Info Card -->
                <div class="lg:col-span-2">
                    <div class="bg-white shadow-xl rounded-xl border border-gray-200 overflow-hidden">
                        <!-- Card Header -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $event->title ?: 'Untitled Event' }}
                            </h2>
                            <p class="text-sm text-gray-600 mt-1">Event ID:
                                #{{ str_pad($event->id, 4, '0', STR_PAD_LEFT) }}</p>
                        </div>

                        <!-- Event Details -->
                        <div class="p-6 space-y-6">
                            <!-- Date & Time -->
                            <div class="flex items-center space-x-4 p-4 bg-green-50 rounded-lg border border-green-200">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">Event Schedule</h3>
                                    <div class="text-sm text-gray-600 space-y-1">
                                        <p><span class="font-medium">Date:</span>
                                            {{ \Carbon\Carbon::parse($event->starts_on)->format('l, F d, Y') }}</p>
                                        <p><span class="font-medium">Time:</span>
                                            {{ \Carbon\Carbon::parse($event->starts_on)->format('h:i A') }}</p>
                                        <p class="text-xs text-green-700 font-medium">
                                            {{ \Carbon\Carbon::parse($event->starts_on)->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Teams Matchup -->
                            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Teams Matchup
                                </h3>
                                <div class="flex items-center justify-between">
                                    <!-- Team One -->
                                    <div class="flex flex-col items-center space-y-3 flex-1">
                                        <div class="relative">
                                            <img src="{{ $event->team_one_logo }}" alt="{{ $event->team_one }}"
                                                class="w-20 h-20 rounded-full object-cover shadow-lg ring-4 ring-white"
                                                onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAiIGhlaWdodD0iODAiIHZpZXdCb3g9IjAgMCA4MCA4MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iNDAiIGN5PSI0MCIgcj0iNDAiIGZpbGw9IiNGM0Y0RjYiLz4KPHN2ZyB4PSIyMCIgeT0iMjAiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgZmlsbD0iIzlDQTNCMCI+CjxwYXRoIGQ9Ik0yMCAyMGE4IDggMCAxMTAgMTYgOCA4IDAgMDEwLTE2ek0yNCAzNmg4YTQgNCAwIDAxNCA0djRhNCA0IDAgMDEtNCA0SDE2YTQgNCAwIDAxLTQtNHYtNGE0IDQgMCAwMTQtNGg4eiIvPgo8L3N2Zz4KPC9zdmc+Cg=='">
                                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">Home</span>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h4 class="text-lg font-bold text-gray-900">{{ $event->team_one }}</h4>
                                        </div>
                                    </div>

                                    <!-- VS Divider -->
                                    <div class="flex flex-col items-center mx-8">
                                        <div
                                            class="w-16 h-16 bg-gradient-to-br from-red-400 to-red-600 rounded-full flex items-center justify-center shadow-lg">
                                            <span class="text-white font-bold text-lg">VS</span>
                                        </div>
                                    </div>

                                    <!-- Team Two -->
                                    <div class="flex flex-col items-center space-y-3 flex-1">
                                        <div class="relative">
                                            <img src="{{ $event->team_two_logo }}" alt="{{ $event->team_two }}"
                                                class="w-20 h-20 rounded-full object-cover shadow-lg ring-4 ring-white"
                                                onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAiIGhlaWdodD0iODAiIHZpZXdCb3g9IjAgMCA4MCA4MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iNDAiIGN5PSI0MCIgcj0iNDAiIGZpbGw9IiNGM0Y0RjYiLz4KPHN2ZyB4PSIyMCIgeT0iMjAiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgZmlsbD0iIzlDQTNCMCI+CjxwYXRoIGQ9Ik0yMCAyMGE4IDggMCAxMTAgMTYgOCA4IDAgMDEwLTE2ek0yNCAzNmg4YTQgNCAwIDAxNCA0djRhNCA0IDAgMDEtNCA0SDE2YTQgNCAwIDAxLTQtNHYtNGE0IDQgMCAwMTQtNGg4eiIvPgo8L3N2Zz4KPC9zdmc+Cg=='">
                                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                                <span
                                                    class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">Away</span>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h4 class="text-lg font-bold text-gray-900">{{ $event->team_two }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Price Card -->
                    <div class="bg-white shadow-xl rounded-xl border border-gray-200 overflow-hidden">
                        <div class="bg-gradient-to-r from-emerald-50 to-green-50 px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Ticket Price
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-center">
                                @if ($event->price && $event->price > 0)
                                    <div class="flex flex-col items-center space-y-3">
                                        <div
                                            class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-blue-600" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <span
                                            class="inline-flex items-center px-4 py-2 rounded-full text-lg font-bold bg-blue-100 text-blue-800 ring-1 ring-blue-600/20">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            ${{ number_format($event->price, 2) }}
                                        </span>
                                        <p class="text-xs text-gray-500 text-center">per ticket</p>
                                    </div>
                                @else
                                    <div class="flex flex-col items-center space-y-3">
                                        <div
                                            class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-green-600" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <span
                                            class="inline-flex items-center px-4 py-2 rounded-full text-lg font-bold bg-green-100 text-green-800 ring-1 ring-green-600/20">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Free Event
                                        </span>
                                        <p class="text-xs text-gray-500 text-center">no ticket required</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Status Card -->
                    <div class="bg-white shadow-xl rounded-xl border border-gray-200 overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Status
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-center">
                                @if ($event->status == 1)
                                    <div class="flex flex-col items-center space-y-2">
                                        <div
                                            class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                                            <div class="w-6 h-6 bg-green-500 rounded-full animate-pulse"></div>
                                        </div>
                                        <span
                                            class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800 ring-1 ring-green-600/20">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Active Event
                                        </span>
                                    </div>
                                @else
                                    <div class="flex flex-col items-center space-y-2">
                                        <div
                                            class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                                            <div class="w-6 h-6 bg-red-500 rounded-full"></div>
                                        </div>
                                        <span
                                            class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-red-100 text-red-800 ring-1 ring-red-600/20">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Inactive Event
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Meta Information -->
                    <div class="bg-white shadow-xl rounded-xl border border-gray-200 overflow-hidden">
                        <div class="bg-gradient-to-r from-indigo-50 to-blue-50 px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Event Information
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-sm font-medium text-gray-600">Created</span>
                                <span class="text-sm text-gray-900">{{ $event->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-sm font-medium text-gray-600">Last Updated</span>
                                <span class="text-sm text-gray-900">{{ $event->updated_at->diffForHumans() }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-sm font-medium text-gray-600">Event Duration</span>
                                <span class="text-sm text-gray-900">
                                    @php
                                        $now = now();
                                        $eventDate = \Carbon\Carbon::parse($event->starts_on);
                                    @endphp
                                    @if ($eventDate->isPast())
                                        <span class="text-red-600">Completed</span>
                                    @else
                                        <span class="text-green-600">Upcoming</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
