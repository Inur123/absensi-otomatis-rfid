@if (session('success'))
    <div x-data="{ show: true }" x-show="show"
         x-transition.opacity.duration.300ms
         x-init="setTimeout(() => show = false, 3000)"
         class="fixed top-5 right-5 z-50 flex items-center gap-3 w-full max-w-sm rounded-lg shadow-lg bg-green-500 text-white p-4">
        {{-- Success icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('success') }}</span>
    </div>

@elseif (session('error'))
    <div x-data="{ show: true }" x-show="show"
         x-transition.opacity.duration.300ms
         x-init="setTimeout(() => show = false, 3000)"
         class="fixed top-5 right-5 z-50 flex items-center gap-3 w-full max-w-sm rounded-lg shadow-lg bg-red-500 text-white p-4">
        {{-- Error icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('error') }}</span>
    </div>

@elseif (session('warning'))
    <div x-data="{ show: true }" x-show="show"
         x-transition.opacity.duration.300ms
         x-init="setTimeout(() => show = false, 3000)"
         class="fixed top-5 right-5 z-50 flex items-center gap-3 w-full max-w-sm rounded-lg shadow-lg bg-yellow-400 text-black p-4">
        {{-- Warning icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v2m0 4h.01M10.29 3.86l-6.18 10.73A2 2 0 006 18h12a2 2 0 001.89-3.41L13.71 3.86a2 2 0 00-3.42 0z" />
        </svg>
        <span>{{ session('warning') }}</span>
    </div>

@elseif (session('info'))
    <div x-data="{ show: true }" x-show="show"
         x-transition.opacity.duration.300ms
         x-init="setTimeout(() => show = false, 3000)"
         class="fixed top-5 right-5 z-50 flex items-center gap-3 w-full max-w-sm rounded-lg shadow-lg bg-blue-500 text-white p-4">
        {{-- Info icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
        </svg>
        <span>{{ session('info') }}</span>
    </div>
@endif
