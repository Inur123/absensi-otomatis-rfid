@extends('admin.layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="container mx-auto px-6 py-8">
    {{-- Card Utama --}}
    <div class="bg-white rounded-lg shadow-md">

        {{-- Header Card --}}
        <div class="p-6 border-b border-gray-200">
           <div class="flex flex-col sm:flex-row justify-between sm:items-center">
                <div>
                    <h4 class="text-xl font-semibold text-gray-800">Manajemen Kategori</h4>
                    <p class="text-sm text-gray-500 mt-1">Kelola semua kategori user di sini.</p>
                </div>
                <a href="{{ route('kategori.create') }}"
                   class="mt-4 sm:mt-0 w-full sm:w-auto px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300 ease-in-out inline-flex items-center justify-center">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                   </svg>
                   Tambah Kategori
                </a>
           </div>
        </div>

        {{-- Wrapper Tabel untuk Scrolling Horizontal --}}
        <div class="overflow-x-auto">
            <table class="min-w-full">
                {{-- Header Tabel --}}
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Kategori
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Dibuat
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>

                {{-- Body Tabel --}}
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($kategoris as $kategori)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">

                        {{-- Nama Kategori --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $kategori->nama }}</div>
                        </td>

                        {{-- Tanggal Dibuat --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                             {{ $kategori->created_at->translatedFormat('d F Y') }}
                        </td>

                        {{-- Aksi --}}
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end items-center space-x-4">
                                <a href="{{ route('kategori.edit', $kategori->id) }}" class="text-indigo-600 hover:text-indigo-900 transition-colors">Edit</a>
                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center text-gray-500">
                            Tidak ada data kategori yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer Card untuk Paginasi --}}
        @if ($kategoris->hasPages())
        <div class="p-6 border-t border-gray-200 bg-gray-50 rounded-b-lg">
            {{ $kategoris->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

