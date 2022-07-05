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

    public function paket(){
        return $this->belongsTo(Paket::class, 'id_paket', 'id_paket');
    }
    // public function jadwal(){
    //     return $this->hasMany(JadwalPelatihan::class, 'nomor_peserta', 'nomor_peserta');
    // }
}
