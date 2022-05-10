<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;
    protected $table = 'instruktur';
    protected $primaryKey = 'nip';
    protected $guarded = [];
    protected $keyType = "string";
    protected $appends = ['materi_url'];
    public function getMateriUrlAttribute()
    {
        return asset('storage/' . $this->materi);
    }
}
