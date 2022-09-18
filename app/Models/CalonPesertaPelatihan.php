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
    // protected $dates = ['tanggal_lahir'];
    protected $casts = [
        'tanggal_lahir' => 'datetime:Y-m-d',
    ];

    public function paket(){
        return $this->belongsTo(Paket::class, 'id_paket', 'id_paket');
    }
    // public function jadwal(){
    //     return $this->hasMany(JadwalPelatihan::class, 'nomor_peserta', 'nomor_peserta');
    // }

    public function nilai(){
        return $this->hasOne(Nilai::class, 'nomor_peserta', 'nomor_peserta')->withDefault(function()
        {
            $nilaiStandar = new Nilai([
                "nilai_sikap_rerata" => 0, 
                "nilai_sikap_bobot" => 0,
                "nilai_akademis_rerata" => 0, 
                "nilai_akademis_bobot" => 0,
            ]);
            return $nilaiStandar;
        });
    }
}
