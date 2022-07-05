<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CalonPesertaPelatihan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'peserta';
    protected $primaryKey = 'nomor_peserta'; 
    protected $guarded = [];
    protected $dates = ['tanggal_lahir'];

    public function instruktur(){
        return $this->belongsTo(Instruktur::class, 'nip', 'nip');
    }
    public function kejuruan(){
        return $this->belongsTo(Kejuruan::class, 'id_kejuruan', 'id_kejuruan');
    }
    // public function jadwal(){
    //     return $this->hasMany(JadwalPelatihan::class, 'nomor_peserta', 'nomor_peserta');
    // }
}
