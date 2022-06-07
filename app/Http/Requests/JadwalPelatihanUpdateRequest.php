<?php

namespace App\Http\Requests;

use App\Models\JadwalPelatihan;
use Illuminate\Foundation\Http\FormRequest;

class JadwalPelatihanUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $id_jadwal = $this->route('jadwal');
        
        return [
            'tanggal'       => 'required|date',
            'waktu'         => 'required',
            'hari'          => 'required',
            'nip'           => ['required','exists:instruktur,nip', function($attribute, $value, $fail) use ($id_jadwal){
                // check if nip doesn't have any jadwal except the one that is being updated
                $jadwal = JadwalPelatihan::where('nip', $value)->where('id_jadwal', '!=', $id_jadwal)->first();
                if($jadwal){
                    $fail('Instruktur sudah memiliki jadwal');
                }
            }],
            'id_kejuruan'   => ['required','exists:kejuruan,id_kejuruan', function($attribute, $value, $fail) use ($id_jadwal){
                /** check if id_kejuruan doesn't have any jadwal except the one that is being updated */
                $jadwal = JadwalPelatihan::where('id_kejuruan', $value)->where('id_jadwal', '!=', $id_jadwal)->first();
                if($jadwal){
                    $fail('Kejuruan sudah memiliki jadwal');
                }
            }],
            'materi'        => 'nullable|file|max:2048',
        ];
    }
    /**
     * pesan error
     * 
     */
    public function messages(){
        return [
            'tanggal.required'       => 'Tanggal tidak boleh kosong',
            'tanggal.date'           => 'Tanggal harus berupa tanggal',
            'waktu.required'         => 'Waktu tidak boleh kosong',
            'waktu.date_format'      => 'Waktu harus berupa waktu',
            'hari.required'          => 'Hari tidak boleh kosong',
            'nip.required'           => 'NIP tidak boleh kosong',
            'nip.exists'             => 'NIP tidak ditemukan',
            'id_kejuruan.required'   => 'Kejuruan tidak boleh kosong',
            'id_kejuruan.exists'     => 'Kejuruan tidak ditemukan',
            'materi.required'        => 'Materi tidak boleh kosong',
        ];
    }
}
