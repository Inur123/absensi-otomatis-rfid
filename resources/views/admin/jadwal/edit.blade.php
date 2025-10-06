@extends('admin.layouts.app')

@section('title', 'Edit Jadwal')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md">

        {{-- Header Card --}}
        <div class="p-6 border-b border-gray-200">
            <h4 class="text-xl font-semibold text-gray-800">Edit Jadwal Absensi</h4>
            <p class="mt-1 text-sm text-gray-600">Perbarui detail jadwal di bawah ini.</p>
        </div>

        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="p-6">
                <div class="space-y-6">
                    {{-- Nama Jadwal --}}
                    <div>
                        <label for="nama_jadwal" class="block text-sm font-medium text-gray-700 mb-1">Nama Jadwal</label>
                        <input type="text" name="nama_jadwal" id="nama_jadwal" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('nama_jadwal', $jadwal->nama_jadwal) }}" required>
                        @error('nama_jadwal')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jam Mulai & Selesai --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                             <label for="jam_mulai" class="block text-sm font-medium text-gray-700 mb-1">Jam Mulai</label>
                             <input type="time" name="jam_mulai" id="jam_mulai" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('jam_mulai', \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i')) }}" required>
                             @error('jam_mulai')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                             @enderror
                        </div>
                        <div>
                             <label for="jam_selesai" class="block text-sm font-medium text-gray-700 mb-1">Jam Selesai</label>
                             <input type="time" name="jam_selesai" id="jam_selesai" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ old('jam_selesai', \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i')) }}" required>
                              @error('jam_selesai')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                             @enderror
                        </div>
                    </div>

                    {{-- Hari --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Hari Berlaku</label>
                        <p class="text-xs text-gray-500 mb-3">Jika tidak ada hari yang dipilih, jadwal akan berlaku setiap hari.</p>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            @php
                                $selectedHari = old('hari', json_decode($jadwal->hari, true) ?? []);
                            @endphp
                            @foreach($hariOptions as $hari)
                                <label for="hari_{{ $loop->index }}" class="flex items-center space-x-2 p-3 border rounded-md hover:bg-gray-50 cursor-pointer">
                                    <input type="checkbox" name="hari[]" id="hari_{{ $loop->index }}" value="{{ $hari }}" class="rounded text-blue-600 focus:ring-blue-500"
                                    {{ in_array($hari, $selectedHari) ? 'checked' : '' }}>
                                    <span>{{ $hari }}</span>
                                </label>
                            @endforeach
                        </div>
                         @error('hari')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                         @enderror
                    </div>
                </div>
            </div>

            {{-- Footer Form --}}
            <div class="p-6 bg-gray-50 border-t border-gray-200 flex justify-end items-center space-x-4">
                <a href="{{ route('jadwal.index') }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                    Update Jadwal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
