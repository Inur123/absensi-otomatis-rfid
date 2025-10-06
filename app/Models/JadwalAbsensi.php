<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalAbsensi extends Model
{
     use HasFactory;
     protected $table = 'jadwal_absensis';

    protected $fillable = ['nama_jadwal', 'jam_mulai', 'jam_selesai', 'hari'];

    protected $casts = [
        'hari' => 'array',
    ];
}
