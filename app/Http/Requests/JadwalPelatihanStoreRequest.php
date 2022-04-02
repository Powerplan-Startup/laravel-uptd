<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JadwalPelatihanStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'tanggal'       => 'required|date',
            'waktu'         => 'required|date_format:H:i',
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
            'tanggal.date'           => 'Format tanggal salah',
            'waktu.required'         => 'Waktu tidak boleh kosong',
            'waktu.date_format'      => 'Format waktu salah',
            'hari.required'          => 'Hari tidak boleh kosong',
            'nip.required'           => 'NIP tidak boleh kosong',
            'nip.exists'             => 'NIP tidak ditemukan',
            'id_kejuruan.required'   => 'Kejuruan tidak boleh kosong',
            'id_kejuruan.exists'     => 'Kejuruan tidak ditemukan',
            'materi.required'        => 'Meteri tidak boleh kosong',
        ];
    }
}
