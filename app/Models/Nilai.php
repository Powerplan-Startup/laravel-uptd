<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $guarded = [];
    protected $append = ['jumlah', 'predikat', 'keterangan'];
    
    public function getJumlahAttribute(){
        return (
            $this->nilai_sikap_rerata * 
            $this->nilai_sikap_bobot
        ) + (
            $this->nilai_akademis_rerata * 
            $this->nilai_akademis_bobot
        );
    }

    public function getPredikatAttribute(){
        $nilai_akhir = $this->getJumlahAttribute();
        if($nilai_akhir >= 95.00){
            return "Sangat Memuaskan";
        } else if($nilai_akhir >= 88.00){
            return "Memuaskan";
        } else if($nilai_akhir >= 81.50){
            return "Baik Sekali";
        } else if($nilai_akhir >= 74.00){
            return "Baik";
        } else if($nilai_akhir >= 67.00){
            return "Cukup";
        } else {
            return "Kurang";
        }
    }
    public function getKeteranganAttribute(){
        $nilai_akhir = $this->getJumlahAttribute();
        if($nilai_akhir >= 67.00){
            return "Kompeten";
        } else {
            return "Tidak Kompeten";
        }
    }
}
