<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalAbsensi;
use App\Models\UserAbsen;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Halaman kelola user & jadwal
    public function index()
    {
        $users = UserAbsen::all();
        $jadwals = JadwalAbsensi::all();
        return view('admin.dashboard', compact('users', 'jadwals'));
    }

    // Simpan user baru
    public function storeUser(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'uuid' => 'required|string|max:255|unique:user_absens',
            'kategori' => 'nullable|string|max:255',
        ]);

        UserAbsen::create($request->all());
        return back()->with('success', 'User baru berhasil ditambahkan!');
    }

    // Simpan jadwal baru
    public function storeJadwal(Request $request)
    {
        $request->validate([
            'nama_jadwal' => 'required|string|max:255',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'hari' => 'required|array',
        ]);

        JadwalAbsensi::create([
            'nama_jadwal' => $request->nama_jadwal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'hari' => json_encode($request->hari),
        ]);

        return back()->with('success', 'Jadwal berhasil ditambahkan!');
    }
}
