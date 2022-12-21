<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_lapangan_id',
        'user_id',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'kegiatan',
        'kode_booking',
        'tipe_pemesan',
        'penanggungjawab',
        'status'
    ];
    protected $table = 'reservasi';
    public function jenis_lapangan(){
        return $this->belongsToMany('App\Models\lapangan', 'id');
    }
}
