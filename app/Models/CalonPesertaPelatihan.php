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
    protected $table = 'calon_peserta_pelatihan';
    protected $primaryKey = 'nomor_peserta'; 
    protected $guarded = [];
}
