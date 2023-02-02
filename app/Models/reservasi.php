<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class reservasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_lapangan_id',
        'user_id',
        'kelas_id',
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
    public function jenislap(){
        return $this->belongsToMany(lapangan::class);
    }

    public function kelas(){
        return $this->hasManyThrough('App\Models\kelas', 'kelas');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public $sortable = ['id', 'created_at', 'status', 'user_id'];
}
