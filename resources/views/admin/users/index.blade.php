@extends('admin.layouts.app')

@section('title', 'Daftar User Absen')

@section('content')
    <div class="container mx-auto px-6 py-8">
        {{-- Card Utama --}}
        <div class="bg-white rounded-lg shadow-md">

            {{-- Header --}}
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800">Manajemen User Absen</h4>
                        <p class="mt-1 text-sm text-gray-500">Daftar semua pengguna yang terdaftar dalam sistem absensi.</p>
                    </div>
                    <a href="{{ route('users.create') }}"
                        class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white text-center font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300 ease-in-out inline-flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Tambah User
                    </a>
                </div>
            </div>

            {{-- Wrapper Tabel untuk Scrolling --}}
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    {{-- Header Tabel --}}
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">UUID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Dibuat</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    {{-- Body Tabel --}}
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">

                                {{-- Kolom User --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <span
                                                class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-semibold">
                                                {{ strtoupper(substr($user->nama, 0, 2)) }}
                                            </span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $user->nama }}</div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Kolom UUID --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-500 font-mono">{{ $user->uuid }}</span>
                                </td>

                                {{-- Kolom Kategori --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $user->kategori?->nama ?? 'Umum' }}
                                    </span>
                                </td>


                                {{-- Kolom Tanggal --}}
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $user->created_at->translatedFormat('d F Y') }}
                                </td>

                                {{-- Kolom Aksi --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end items-center space-x-4">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 transition-colors">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 transition-colors">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    Tidak ada data user absen yang ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Footer untuk paginasi --}}
            @if ($users->hasPages())
                <div class="p-6 border-t border-gray-200 bg-gray-50 rounded-b-lg">
                    {{ $users->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection
