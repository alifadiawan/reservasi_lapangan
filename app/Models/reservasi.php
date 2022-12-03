<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'hari',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'kegiatan',
        'penanggungjawab',
    ];
    protected $table = 'reservasi';
}
