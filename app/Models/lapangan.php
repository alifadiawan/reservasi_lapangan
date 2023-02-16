<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lapangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lapangan'
    ];
    protected $table = 'lapangan';
    
    public function reservasi(){
        return $this->hasOne(reservasi::class);
    }

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];
}

