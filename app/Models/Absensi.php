<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensis';

    protected $fillable = ['nama', 'uuid', 'kategori_id', 'waktu_absen'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
