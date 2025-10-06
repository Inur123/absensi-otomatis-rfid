<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kategori;
use App\Models\JadwalAbsensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Tampilkan daftar absensi
     */
    public function index()
    {
        $absensis = Absensi::with('jadwal')->orderBy('created_at', 'desc')->get();
        return view('admin.absensi.index', compact('absensis'));
    }

    /**
     * Tampilkan form untuk membuat absensi baru
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $jadwals = JadwalAbsensi::all();
        return view('admin.absensi.create', compact('kategoris', 'jadwals'));
    }

    /**
     * Simpan absensi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'nullable|array',
            'kategori_id.*' => 'exists:kategoris,id',
            'jadwal_id' => 'required|exists:jadwal_absensis,id',
        ]);

        Absensi::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id ? json_encode($request->kategori_id) : null,
            'jadwal_id' => $request->jadwal_id,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dibuat.');
    }

    /**
     * Tampilkan form untuk mengedit absensi
     */
    public function edit(Absensi $absensi)
    {
        $kategoris = Kategori::all();
        $jadwals = JadwalAbsensi::all();
        $selectedKategoris = json_decode($absensi->kategori_id, true) ?? [];
        return view('admin.absensi.edit', compact('absensi', 'kategoris', 'jadwals', 'selectedKategoris'));
    }

    /**
     * Update data absensi
     */
    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'nullable|array',
            'kategori_id.*' => 'exists:kategoris,id',
            'jadwal_id' => 'required|exists:jadwal_absensis,id',
        ]);

        $absensi->update([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id ? json_encode($request->kategori_id) : null,
            'jadwal_id' => $request->jadwal_id,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Hapus absensi
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->back()->with('success', 'Data absensi berhasil dihapus.');
    }
}
