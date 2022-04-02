<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JadwalPelatihanUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'tanggal'       => 'required|date',
            'waktu'         => 'required|date_format:H:i:s',
            'hari'          => 'required',
            'nip'           => 'required|exists:instruktur,nip',
            'id_kejuruan'   => 'required|exists:kejuruan,id_kejuruan',
            'materi'        => 'required',
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
