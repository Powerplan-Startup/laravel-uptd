<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelatihan extends Model
{
    use HasFactory;
    use Compoships;

    protected $table = 'jadwal_pelatihan';
    protected $primaryKey = 'id_jadwal';
    protected $guarded = [];
    // protected $dates = ['tanggal'];
    protected $casts = [
        'tanggal' => 'datetime:Y-m-d',
        'waktu' => 'datetime:H:i',
        'waktu_berakhir' => 'datetime:H:i',
    ];
    protected $appends = ['materi_url'];

    public function getMateriUrlAttribute(){
        return asset('storage/' . $this->materi);
    }
    
    public function kejuruan(){
        return $this->belongsTo(Kejuruan::class, 'id_kejuruan', 'id_kejuruan');
    }
    public function instruktur(){
        return $this->belongsTo(Instruktur::class, 'nip', 'nip');
    }
    public function jadwals(){
        return $this->hasMany(JadwalPelatihan::class, ['paket', 'id_kejuruan', 'judul'], ['paket', 'id_kejuruan', 'judul']);
    }
    public function jadwal(){
        return $this->hasMany(JadwalPelatihan::class, ['paket', 'id_kejuruan', 'nomor_peserta', 'judul'], ['paket', 'id_kejuruan', 'nomor_peserta', 'judul']);
    }
}
