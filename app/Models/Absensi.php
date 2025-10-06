<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensis';

    protected $fillable = ['nama', 'jadwal_id', 'kategori_id'];

    /**
     * Relasi ke jadwal absensi.
     */
    public function jadwal()
    {
        return $this->belongsTo(JadwalAbsensi::class, 'jadwal_id');
    }

    /**
     * Jika suatu saat ingin relasi kategori many-to-many
     * Catatan: Saat ini kategori disimpan sebagai JSON di kolom kategori_id
     */
    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'absensi_kategori', 'absensi_id', 'kategori_id');
    }

    /**
     * Mendapatkan kategori sebagai array dari JSON
     */
    public function getKategoriArrayAttribute()
    {
        return $this->kategori_id ? json_decode($this->kategori_id, true) : [];
    }
}
