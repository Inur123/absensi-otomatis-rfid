<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAbsen;
use App\Models\Kategori;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan daftar user absen
    public function index()
    {
        // Load relasi kategori agar bisa langsung dipakai di view
        $users = UserAbsen::with('kategori')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // Menampilkan form tambah user absen
    public function create()
    {
        // Ambil semua kategori untuk dropdown
        $kategoris = Kategori::all();
        return view('admin.users.create', compact('kategoris'));
    }

    // Menyimpan user absen baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'uuid' => 'required|string|unique:user_absens,uuid',
            'kategori_id' => 'nullable|exists:kategoris,id',
        ]);

        UserAbsen::create([
            'nama' => $request->nama,
            'uuid' => $request->uuid,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User absen berhasil ditambahkan!');
    }

    // Menampilkan form edit user absen
    public function edit($id)
    {
        $user = UserAbsen::findOrFail($id);
        $kategoris = Kategori::all(); // Untuk dropdown
        return view('admin.users.edit', compact('user', 'kategoris'));
    }

    // Mengupdate data user absen
    public function update(Request $request, $id)
    {
        $user = UserAbsen::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100',
            'uuid' => 'required|string|unique:user_absens,uuid,' . $user->id,
            'kategori_id' => 'nullable|exists:kategoris,id',
        ]);

        $user->update([
            'nama' => $request->nama,
            'uuid' => $request->uuid,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'Data user absen berhasil diperbarui!');
    }

    // Menghapus user absen
    public function destroy($id)
    {
        UserAbsen::findOrFail($id)->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User absen berhasil dihapus!');
    }
}
