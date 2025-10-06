@extends('admin.layouts.app')

@section('title', 'Manajemen Absensi')

@section('content')
<div class="container mx-auto px-6 py-8">
    {{-- Card Utama --}}
    <div class="bg-white rounded-lg shadow-md">

        {{-- Header Card --}}
        <div class="p-6 border-b border-gray-200">
           <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                <div>
                    <h4 class="text-xl font-semibold text-gray-800">Manajemen Absensi</h4>
                    <p class="mt-1 text-sm text-gray-500">Kelola semua data absensi yang telah dibuat.</p>
                </div>
                <a href="{{ route('absensi.create') }}"
                   class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white text-center font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300 ease-in-out inline-flex items-center justify-center">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                   </svg>
                   Buat Absensi Baru
                </a>
           </div>
        </div>

        {{-- Wrapper Tabel untuk Scrolling --}}
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Absensi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jadwal yang Digunakan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($absensis as $absensi)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $absensi->nama }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($absensi->jadwal)
                                <div class="text-sm text-gray-900">{{ $absensi->jadwal->nama_jadwal }}</div>
                                <div class="text-xs text-gray-600 font-mono">
                                    {{ \Carbon\Carbon::parse($absensi->jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($absensi->jadwal->jam_selesai)->format('H:i') }}
                                </div>
                            @else
                                <span class="text-xs text-red-500 italic">Jadwal tidak ditemukan</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
    @if($absensi->kategoriArray)
        @foreach($absensi->kategoriArray as $kategoriId)
            @php
                $kategori = \App\Models\Kategori::find($kategoriId);
            @endphp
            @if($kategori)
                <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full mr-1">
                    {{ $kategori->nama }}
                </span>
            @endif
        @endforeach
    @else
        <span class="text-xs text-gray-500 italic">Tidak ada kategori</span>
    @endif
</td>


                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end items-center space-x-4">
                                <a href="{{ route('absensi.edit', $absensi->id) }}" class="text-indigo-600 hover:text-indigo-900 transition-colors">Edit</a>
                                <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data absensi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition-colors">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center text-gray-500">
                            Tidak ada data absensi yang ditemukan. Silakan buat absensi baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
