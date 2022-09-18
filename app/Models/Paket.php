<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    protected $guarded = [];

    public function instruktur(){
        return $this->belongsTo(Instruktur::class, 'nip', 'nip');
    }
    public function kejuruan(){
        return $this->belongsTo(Kejuruan::class, 'id_kejuruan', 'id_kejuruan');
    }
    public function jadwals(){
        return $this->hasMany(JadwalPelatihan::class, 'id_paket', 'id_paket');
    }
    public function jadwal(){
        return $this->hasOne(JadwalPelatihan::class, 'id_paket', 'id_paket');
    }
    public function alumni(){
        return $this->hasMany(CalonPesertaPelatihan::class, 'id_paket', 'id_paket')->whereStatusPeserta('alumni');
    }
    public function peserta(){
        return $this->hasMany(CalonPesertaPelatihan::class, 'id_paket', 'id_paket');
    }
}
