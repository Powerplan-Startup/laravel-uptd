<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kejuruan extends Model
{
    use HasFactory;
    protected $table = 'kejuruan';
    protected $primaryKey = 'id_kejuruan';
    protected $guarded = [];

    // public function jadwal(){
    //     return $this->belongsTo(JadwalPelatihan::class, 'id_jadwal');
    // }
    // public function alumni(){
    //     return $this->hasMany(CalonPesertaPelatihan::class, 'id_kejuruan', 'id_kejuruan')->whereStatusPeserta('alumni');
    // }
    // public function peserta(){
    //     return $this->hasMany(CalonPesertaPelatihan::class, 'id_kejuruan', 'id_kejuruan');
    // }
    public function paket(){
        return $this->hasMany(Paket::class, 'id_kejuruan', 'id_kejuruan');
    }
}
