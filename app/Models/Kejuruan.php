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

    public function paket(){
        return $this->hasOne(Paket::class, 'id_kejuruan', 'id_kejuruan');
    }
}
