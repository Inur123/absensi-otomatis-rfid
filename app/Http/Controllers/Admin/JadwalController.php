<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalAbsensi;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Menampilkan semua jadwal.
     */
    public function index()
    {
        $jadwals = JadwalAbsensi::orderBy('jam_mulai')->get();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    /**
     * Menampilkan form untuk membuat jadwal baru.
     */
    public function create()
    {
        $hariOptions = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        return view('admin.jadwal.create', compact('hariOptions'));
    }

    /**
     * Menyimpan jadwal baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jadwal' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'hari' => 'nullable|array',
            'hari.*' => 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
        ]);

        JadwalAbsensi::create([
            'nama_jadwal' => $request->nama_jadwal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'hari' => $request->hari ? json_encode($request->hari) : null,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dibuat.');
    }

    /**
     * Menampilkan form edit jadwal.
     */
    public function edit(JadwalAbsensi $jadwal)
    {
        $hariOptions = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $selectedHari = $jadwal->hari ?? [];
        return view('admin.jadwal.edit', compact('jadwal', 'hariOptions', 'selectedHari'));
    }


    /**
     * Memperbarui jadwal yang ada.
     */
    public function update(Request $request, JadwalAbsensi $jadwal)
    {
        $request->validate([
            'nama_jadwal' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'hari' => 'nullable|array',
            'hari.*' => 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
        ]);

        $jadwal->update([
            'nama_jadwal' => $request->nama_jadwal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'hari' => $request->hari ? json_encode($request->hari) : null,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Menghapus jadwal.
     */
    public function destroy(JadwalAbsensi $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
