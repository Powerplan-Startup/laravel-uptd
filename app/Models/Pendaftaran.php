<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = ['nomor_peserta'];
    
    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class, 'nip');
    }
}
