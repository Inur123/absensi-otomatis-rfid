<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';


    protected $fillable = ['nama'];

    public function userAbsens()
    {
        return $this->hasMany(UserAbsen::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
