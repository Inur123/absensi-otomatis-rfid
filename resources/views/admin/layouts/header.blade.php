<header
    class="flex items-center justify-between p-5 bg-white border-b border-gray-300 shadow-md lg:py-5 lg:px-8 flex-shrink-0">
    <div class="flex items-center">
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none cursor-pointer">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div class="flex items-center space-x-4">
        <!-- Tombol notifikasi -->
        <button class="text-gray-500 hover:text-gray-700">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </button>

        <!-- Dropdown User -->
        <div x-data="{ dropdownOpen: false, showLogoutModal: false }" class="relative">
            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 focus:outline-none cursor-pointer">
                {{-- Foto profil --}}
                <img
                    src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random&color=fff' }}"
                    alt="User Avatar"
                    class="h-10 w-10 rounded-full object-cover"
                >

                {{-- Ikon panah berputar halus --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                    :class="{'rotate-180': dropdownOpen}"
                    class="h-4 w-4 text-gray-500 transition-transform duration-300 transform"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            {{-- Dropdown menu --}}
            <div
                x-show="dropdownOpen"
                @click.away="dropdownOpen = false"
                x-transition
                x-cloak
                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-xl z-20"
            >
                <button
                    @click.prevent="showLogoutModal = true; dropdownOpen = false"
                    class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-sign-out-alt text-gray-500 w-4"></i> Logout
                </button>
            </div>

            {{-- Modal Logout --}}
            <div
                x-show="showLogoutModal"
                x-cloak
                class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm z-50"
                x-transition.opacity
            >
                <div class="bg-white rounded-lg shadow-lg w-80 p-6 text-center">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Konfirmasi Logout</h2>
                    <p class="text-sm text-gray-600 mb-6">Apakah Anda yakin ingin keluar dari akun ini?</p>

                    <div class="flex justify-center gap-4">
                        <button @click="showLogoutModal = false"
                            class="px-4 py-2 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">
                            Batal
                        </button>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 rounded-md bg-red-600 text-white hover:bg-red-700">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
