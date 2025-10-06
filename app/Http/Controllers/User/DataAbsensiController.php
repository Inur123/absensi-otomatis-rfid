<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Absensi;
use App\Models\UserAbsen;
use App\Models\DataAbsensi;
use App\Models\JadwalAbsensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataAbsensiController extends Controller
{
    // Form input UUID
    public function form()
    {
        return view('user.data_absensi.form');
    }

    // Proses absen
    public function absen(Request $request)
    {
        // Validasi input UUID
        $request->validate([
            'uuid' => 'required|uuid',
        ]);

        // Ambil user berdasarkan UUID
        $user = UserAbsen::where('uuid', $request->uuid)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'UUID tidak ditemukan.');
        }

        // Pastikan user punya kategori
        if (!$user->kategori_id) {
            return redirect()->back()->with('error', 'User belum punya kategori.');
        }

        $now = Carbon::now();
        $today = $now->format('l'); // nama hari Inggris
        $hariIndo = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ][$today];

        // Ambil jadwal yang aktif saat ini (jam & hari)
        $jadwal = JadwalAbsensi::where('jam_mulai', '<=', $now->toTimeString())
                    ->where('jam_selesai', '>=', $now->toTimeString())
                    ->get()
                    ->filter(function($item) use ($hariIndo) {
                        $hariArray = json_decode($item->hari, true) ?: [];
                        return in_array($hariIndo, $hariArray);
                    })
                    ->first();

        if (!$jadwal) {
            return redirect()->back()->with('error', 'Belum ada jadwal absen saat ini.');
        }

        // Pastikan kategori_id integer agar bisa dicocokkan
        $kategoriId = (int) $user->kategori_id;

        // Ambil semua absensi untuk jadwal ini
        $absensi = Absensi::where('jadwal_id', $jadwal->id)->get()
                    ->first(function($a) use ($kategoriId) {
                        $kats = json_decode($a->kategori_id, true) ?: [];
                        return in_array($kategoriId, $kats);
                    });

        if (!$absensi) {
            return redirect()->back()->with('error', 'Tidak ada absen untuk kategori dan jadwal saat ini.');
        }

        // Cek apakah user sudah absen di jadwal ini hari ini
        $exist = DataAbsensi::where('uuid', $user->uuid)
                    ->where('tanggal', $now->toDateString())
                    ->where('jam', '>=', $jadwal->jam_mulai)
                    ->where('jam', '<=', $jadwal->jam_selesai)
                    ->first();

        if ($exist) {
            return redirect()->back()->with('error', 'Anda sudah absen pada jadwal ini.');
        }

        // Simpan absen
        DataAbsensi::create([
            'uuid' => $user->uuid,
            'status' => 'hadir',
            'tanggal' => $now->toDateString(),
            'jam' => $now->toTimeString(),
        ]);

        return redirect()->back()->with('success', 'Absen berhasil dicatat.');
    }
}
