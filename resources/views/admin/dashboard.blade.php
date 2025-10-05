@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h3 class="text-3xl font-bold text-gray-800">Selamat Datang, Admin!</h3>
    <p class="mt-2 text-gray-600">Berikut adalah ringkasan aktivitas bisnis Anda hari ini.</p>

    <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase">Pendapatan</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">$24,350</p>
                </div>
                <div class="p-3 bg-blue-100 rounded-full">
                    <svg class="h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
            </div>
            <p class="text-xs text-green-500 mt-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L6.22 8.77a.75.75 0 01-1.06-1.06l4.25-4.25a.75.75 0 011.06 0l4.25 4.25a.75.75 0 01-1.06 1.06L10.75 5.612V16.25A.75.75 0 0110 17z" clip-rule="evenodd" /></svg> 12.5% dari bulan lalu</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
           <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase">Pesanan</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">1,832</p>
                </div>
                <div class="p-3 bg-green-100 rounded-full">
                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.658-.463 1.243-1.117 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.117 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                </div>
            </div>
             <p class="text-xs text-green-500 mt-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L6.22 8.77a.75.75 0 01-1.06-1.06l4.25-4.25a.75.75 0 011.06 0l4.25 4.25a.75.75 0 01-1.06 1.06L10.75 5.612V16.25A.75.75 0 0110 17z" clip-rule="evenodd" /></svg> 8.2% dari bulan lalu</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
           <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase">Pengunjung</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">32,128</p>
                </div>
                <div class="p-3 bg-yellow-100 rounded-full">
                    <svg class="h-6 w-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.5-2.28a4.5 4.5 0 00-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 001.13-1.897L16.5 7.5m0 0l-3-3m0 0l-3 3m3-3v5.25A2.25 2.25 0 0014.25 15h3.75m0 0H18a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0018 4.5h-1.5m-7.5 0h-3.75A2.25 2.25 0 003 6.75v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75v-3.75m-7.5 0h7.5" /></svg>
                </div>
            </div>
            <p class="text-xs text-red-500 mt-2 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a.75.75 0 01.75.75v10.638l3.03-3.158a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.06 0l-4.25-4.5a.75.75 0 111.06-1.04l3.03 3.158V3.75A.75.75 0 0110 3z" clip-rule="evenodd" /></svg> 2.1% dari bulan lalu</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
           <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase">Rata-rata Penjualan</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">$150.25</p>
                </div>
                <div class="p-3 bg-red-100 rounded-full">
                    <svg class="h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>
                </div>
            </div>
             <p class="text-xs text-gray-500 mt-2 flex items-center">Data penjualan per transaksi</p>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 p-6 bg-white rounded-lg shadow-md">
            <h4 class="text-lg font-semibold text-gray-700">Tinjauan Penjualan</h4>
            <div class="mt-4 h-80 bg-gray-200 rounded-lg flex items-center justify-center">
                <p class="text-gray-500">Placeholder untuk Grafik Garis</p>
            </div>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-md">
             <h4 class="text-lg font-semibold text-gray-700">Sumber Lalu Lintas</h4>
              <div class="mt-4 h-80 bg-gray-200 rounded-lg flex items-center justify-center">
                  <p class="text-gray-500">Placeholder untuk Grafik Donat</p>
              </div>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-lg shadow-md">
        <div class="p-6 border-b border-gray-200">
           <h4 class="text-lg font-semibold text-gray-700">Transaksi Terbaru</h4>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pesanan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Budi Santoso</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$250.00</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">28 Sep 2025</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-002</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Citra Lestari</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$150.75</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Tertunda</span></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">27 Sep 2025</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-003</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Agus Wijaya</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$500.20</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Dikirim</span></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">27 Sep 2025</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-004</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dewi Anggraini</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$80.00</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Dibatalkan</span></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">26 Sep 2025</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
