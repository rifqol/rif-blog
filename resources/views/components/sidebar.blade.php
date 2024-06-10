<!-- resources/views/components/sidebar.blade.php -->
<div x-data="{ open: false }" class="relative">
    <!-- Sidebar for desktop -->
    <div class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white hidden md:flex flex-col">
        <div class="flex items-center justify-center h-16 bg-gray-900">
            <span class="text-xl font-bold">Dashboard</span>
        </div>
        <nav class="flex-auto px-2 py-4 space-y-1 overflow-y-auto">
            <a href="{{ url('dashboard') }}" class="block px-2 py-2 rounded-md hover:bg-gray-700 {{ Request::is('dashboard') ? 'bg-gray-700' : '' }}">
                Dashboard
            </a>
            <a href="{{ url('dashboard/posts') }}" class="block px-2 py-2 rounded-md hover:bg-gray-700 {{ Request::is('dashboard/posts*') ? 'bg-gray-700' : '' }}">
                My Posts
            </a>
        </nav>
    </div>

    <!-- Sidebar for mobile -->
    <div class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white md:hidden z-40 transform transition-transform duration-200 ease-in-out"
         :class="open ? 'translate-x-0' : '-translate-x-full'">
        <div class="flex items-center justify-center h-16 bg-gray-900">
            <span class="text-xl font-bold">Dashboard</span>
        </div>
        <nav class="flex-auto px-2 py-4 space-y-1 overflow-y-auto">
            <a href="{{ url('dashboard') }}" class="block px-2 py-2 rounded-md hover:bg-gray-700 {{ Request::is('dashboard') ? 'bg-gray-700' : '' }}">
                Dashboard
            </a>
            <a href="{{ url('dashboard/posts') }}" class="block px-2 py-2 rounded-md hover:bg-gray-700 {{ Request::is('dashboard/posts*') ? 'bg-gray-700' : '' }}">
                My Posts
            </a>
        </nav>
    </div>

    <!-- Button to open sidebar on mobile -->
    <div class="md:hidden fixed top-0 left-0 p-4 z-50">
        <button @click="open = !open" class="text-white focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Overlay when sidebar is open on mobile -->
    <div class="md:hidden fixed inset-0 bg-black opacity-50 z-30" x-show="open" @click="open = false"></div>
</div>
