<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonPesertaPelatihan extends Model
{
    use HasFactory;
    protected $table = 'calon_peserta_pelatihan';
    protected $primaryKey = 'nomor_peserta'; 
}
