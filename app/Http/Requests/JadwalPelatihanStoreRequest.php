<?php

namespace App\Http\Requests;

use App\Models\JadwalPelatihan;
use App\Models\Paket;
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
            'tanggal.*'         => 'required|date',
            'waktu.*'           => 'required|date_format:H:i',
            'waktu_berakhir.*'  => 'required|date_format:H:i',
            'hari.*'            => 'required',
            'pertemuan'         => 'required|numeric',
            // 'judul'             => 'required',
            // 'paket'             => 'required|numeric',
            'nip'               => ['required','exists:instruktur,nip', function($attribute, $value, $fail){
                // check if nip doesn't have any jadwal
                // $jadwal = JadwalPelatihan::where('nip', $value)->first();
                // if($jadwal){
                //     $fail('Instruktur sudah memiliki jadwal');
                // }
            }],
            'id_paket'          => ['required','exists:paket,id_paket', function($attribute, $value, $fail){
                // check if paket already has any jadwal relationship
                $jadwal = Paket::whereHas('jadwals', function($query) use ($value){
                    $query->where('id_paket', $value);
                })->first();

                if($jadwal){
                    $fail('Paket sudah memiliki jadwal');
                }
            }],
            'id_kejuruan'   => ['required','exists:kejuruan,id_kejuruan', function($attribute, $value, $fail){
                /** check if id_kejuruan doesn't have any jadwal */
                // $jadwal = JadwalPelatihan::where('id_kejuruan', $value)->first();
                // if($jadwal){
                //     $fail('Kejuruan sudah memiliki jadwal');
                // }
            }],
            // 'materi'        => 'required',
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
