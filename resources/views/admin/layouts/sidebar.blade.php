<div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black/50 transition-opacity lg:hidden"
    x-cloak></div>

<aside :class="sidebarOpen ? 'translate-x-0 w-64' : '-translate-x-full w-64 lg:w-20 lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-30 bg-gray-900 text-white transform transition-all duration-300 ease-in-out">

    <div class="flex items-center h-20 px-4 border-b border-gray-800"
        :class="sidebarOpen ? 'justify-between' : 'justify-center'">
        <a href="#" class="flex items-center" :class="!sidebarOpen && 'justify-center w-full'">
            <svg class="h-8 w-8 text-blue-500 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
            </svg>
            <span class="ml-2 text-xl font-bold transition-opacity duration-200"
                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none w-0'" x-cloak>AdminPanel</span>
        </a>
    </div>

    <nav class="mt-6 flex-1 px-2 space-y-2">
        <a href="{{ route('dashboard') }}"
            class="flex items-center text-gray-100 hover:bg-gray-700 hover:text-white rounded-lg transition-colors duration-200
                    {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}"
            :class="{ 'px-4 py-2': sidebarOpen, 'p-2 justify-center': !sidebarOpen }">
            <svg class="h-6 w-6 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="ml-3 transition-opacity duration-200"
                :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none w-0'" x-cloak>
                Dashboard
            </span>
        </a>

        <!-- Tambah Data User -->
        <a href="{{ route('users.index') }}"
    class="flex items-center text-gray-100 hover:bg-gray-700 hover:text-white rounded-lg transition-colors duration-200
    {{ request()->routeIs('users.*') ? 'bg-gray-700' : '' }}"
    :class="{ 'px-4 py-2': sidebarOpen, 'p-2 justify-center': !sidebarOpen }">
    <svg class="h-6 w-6 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2" fill="none" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M6 20c0-2.21 3.58-4 6-4s6 1.79 6 4" />
    </svg>

    <span class="ml-3 transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none w-0'" x-cloak>
        User
    </span>
</a>

        <a href="{{ route('kategori.index') }}"
        class="flex items-center text-gray-100 hover:bg-gray-700 hover:text-white rounded-lg transition-colors duration-200
            {{ request()->routeIs('kategori.*') ? 'bg-gray-700' : '' }}"
        :class="{ 'px-4 py-2': sidebarOpen, 'p-2 justify-center': !sidebarOpen }">
        <svg class="h-6 w-6 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <span class="ml-3 transition-opacity duration-200"
            :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none w-0'" x-cloak>
            Kategori
        </span>
    </a>
    </nav>
</aside>
