<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataAbsensi extends Model
{
    protected $table = 'data_absensis';

    protected $fillable = ['uuid', 'status', 'tanggal', 'jam'];
}
