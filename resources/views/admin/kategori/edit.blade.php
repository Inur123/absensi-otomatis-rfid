@extends('admin.layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md">

        {{-- Header Card --}}
        <div class="p-6 border-b border-gray-200">
            <h4 class="text-xl font-semibold text-gray-800">Edit Kategori</h4>
            <p class="mt-1 text-sm text-gray-600">Perbarui nama kategori di bawah ini.</p>
        </div>

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Penting untuk proses update --}}

            {{-- Body Form --}}
            <div class="p-6">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                    <input type="text" name="nama" id="nama"
                           class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                                  placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           value="{{ old('nama', $kategori->nama) }}" required> {{-- Mengisi data lama --}}
                    @error('nama')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Footer Form (Tombol Aksi) --}}
            <div class="p-6 bg-gray-50 border-t border-gray-200 flex justify-end items-center space-x-4">
                <a href="{{ route('kategori.index') }}"
                   class="px-4 py-2 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 transition-colors duration-300">
                    Batal
                </a>
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                      <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
