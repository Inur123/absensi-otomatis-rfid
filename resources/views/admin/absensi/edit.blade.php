@extends('admin.layouts.app')

@section('title', 'Edit Absensi')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md">

        {{-- Header Card --}}
        <div class="p-6 border-b border-gray-200">
            <h4 class="text-xl font-semibold text-gray-800">Edit Absensi</h4>
            <p class="mt-1 text-sm text-gray-600">Ubah data absensi yang sudah ada.</p>
        </div>

        <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="p-6 space-y-6">

                {{-- Nama Absensi --}}
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Absensi</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $absensi->nama) }}" required
                           class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           placeholder="Contoh: Absensi Harian Karyawan">
                    @error('nama')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Pilih Jadwal --}}
                <div>
                    <label for="jadwal_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Jadwal</label>
                    <select name="jadwal_id" id="jadwal_id" required
                            class="block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="">-- Pilih Jadwal --</option>
                        @foreach($jadwals as $jadwal)
                            <option value="{{ $jadwal->id }}" {{ old('jadwal_id', $absensi->jadwal_id) == $jadwal->id ? 'selected' : '' }}>
                                {{ $jadwal->nama_jadwal }} ({{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }})
                            </option>
                        @endforeach
                    </select>
                    @error('jadwal_id')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori (Opsional) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Berlaku untuk Kategori (Opsional)</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach($kategoris as $kategori)
                            <label for="kategori_{{ $kategori->id }}" class="flex items-center space-x-2 p-3 border rounded-md hover:bg-gray-50 cursor-pointer">
                                <input type="checkbox" name="kategori_id[]" id="kategori_{{ $kategori->id }}" value="{{ $kategori->id }}"
                                    {{ (is_array(old('kategori_id', $selectedKategoris)) && in_array($kategori->id, old('kategori_id', $selectedKategoris))) ? 'checked' : '' }}
                                    class="rounded text-blue-600 focus:ring-blue-500">
                                <span>{{ $kategori->nama }}</span>
                            </label>
                        @endforeach
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Jika tidak ada kategori yang dipilih, absensi akan berlaku untuk semua.</p>
                    @error('kategori_id.*')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Footer Form --}}
            <div class="p-6 bg-gray-50 border-t border-gray-200 flex justify-end items-center space-x-4">
                <a href="{{ route('absensi.index') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                    Update Absensi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
