<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelatihan extends Model
{
    use HasFactory;
    protected $table = 'jadwal_pelatihan';
    protected $primaryKey = 'id_jadwal';
    protected $guarded = [];
    protected $dates = ['tanggal'];
    
    public function kejuruan(){
        return $this->belongsTo(Kejuruan::class, 'id_kejuruan', 'id_kejuruan');
    }
    public function instruktur(){
        return $this->belongsTo(Instruktur::class, 'nip', 'nip');
    }
}
