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
            'tanggal.*'         => 'required|date',
            'waktu.*'           => 'required|date_format:H:i',
            'waktu_berakhir.*'  => 'required|date_format:H:i',
            'hari.*'            => 'required',
            'pertemuan'         => 'required|numeric',
            'judul'             => 'required',
            'paket'             => 'required|numeric',
            'id_kejuruan'   => ['required','exists:kejuruan,id_kejuruan', function($attribute, $value, $fail) use ($id_jadwal){}],
            'nip'               => ['required','exists:instruktur,nip', function($attribute, $value, $fail){}],
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
