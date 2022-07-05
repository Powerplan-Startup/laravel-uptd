<?php

namespace App\Http\Requests;

use App\Models\Paket;
use Illuminate\Foundation\Http\FormRequest;

class PaketUpdateRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'tanggal_daftar_mulai'      => 'required|date',
            'tanggal_daftar_selesai'    => 'required|date|after:tanggal_daftar_mulai',
            'tahun'                     => 'required|min:4|max:4',
            'paket'                     => 'required|numeric',
            'nip'                       => ['required','exists:instruktur,nip', function($attribute, $value, $fail){
                // check if nip doesn't have any jadwal
                $paket = Paket::where('nip', $value)
                    ->where('tahun', $this->tahun)
                    ->whereNot('id_kejuruan', $this->id_kejuruan)
                    ->whereNot('id_paket', $this->route('paket')->id_paket)
                    ->first();
                if($paket){
                    $fail('Instruktur sudah memiliki jadwal lain');
                }
            }],
            'id_kejuruan'   => ['required','exists:kejuruan,id_kejuruan', function($attribute, $value, $fail){
                /** check if id_kejuruan doesn't have any jadwal */
                // $jadwal = JadwalPelatihan::where('id_kejuruan', $value)->first();
                // if($jadwal){
                //     $fail('Kejuruan sudah memiliki jadwal');
                // }
            }],
        ];
    }
}
