{{-- Sidebar --}}
<div class="w-64 bg-gray-800 text-white p-4 rounded-lg shadow-sm mr-6 h-fit">
    <nav>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 rounded-md hover:bg-gray-700 transition duration-200">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('events.index') }}"
                    class="block px-4 py-2 rounded-md hover:bg-gray-700 transition duration-200 bg-gray-700 font-semibold">
                    Events
                </a>
            </li>
            {{-- Add more navigation links here --}}
        </ul>
    </nav>
</div>
