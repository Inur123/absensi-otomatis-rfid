<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAbsen extends Model
{
    use HasFactory;
    protected $table = 'user_absens';

    protected $fillable = ['nama', 'uuid', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
