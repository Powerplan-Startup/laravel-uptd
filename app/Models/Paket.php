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

    public function kejuruan(){
        return $this->belongsTo(Kejuruan::class, 'id_kejuruan', 'id_kejuruan');
    }
}
