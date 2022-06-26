<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $guarded = [];
    protected $appends = ['cover_url'];

    public function getCoverUrlAttribute()
    {
        if(Storage::disk('public')->exists($this->cover))
            return Storage::disk('public')->url($this->cover);
        return null;
    }
}
