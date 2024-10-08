<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsahaWarga extends Model
{
    use HasFactory;
    protected $table = 'usaha_wargas';

    protected $fillable = [
        'gambar',
        'nama_usaha',
        'deskripsi'
    ];
}
