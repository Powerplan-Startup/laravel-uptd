<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstrukturUpdateRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules()
    {
        $nip = $this->route('instruktur')->nip;
        return [
            'nama'      => 'required|string|max:30',
            'nip'       => 'required|string|max:18|unique:instruktur,nip,'.$nip.',nip',
            'alamat'    => 'required|string|max:20',
            'no_hp'     => 'required|string|max:12',
            'foto'      => 'nullable|file|max:2048',
            'jenis_kelamin' => 'required|in:l,p',
            'username'  => 'required|string|max:20|unique:instruktur,username,'.$nip.',nip',
            'password'  => 'nullable|string|min:6',
        ];
    }
    /**
     * messages in indonesian
     * 
     */
    public function messages(){
        return [
            'nama.required'     => 'Nama tidak boleh kosong',
            'nama.string'       => 'Nama harus berupa string',
            'nama.max'          => 'Nama tidak boleh lebih dari :max karakter',
            'nip.required'      => 'NIP tidak boleh kosong',
            'nip.string'        => 'NIP harus berupa string',
            'nip.max'           => 'NIP tidak boleh lebih dari :max karakter',
            'nip.unique'        => 'NIP sudah terdaftar',
            'alamat.required'   => 'Alamat tidak boleh kosong',
            'alamat.string'     => 'Alamat harus berupa string',
            'alamat.max'        => 'Alamat tidak boleh lebih dari :max karakter',
            'no_hp.required'    => 'No HP tidak boleh kosong',
            'no_hp.string'      => 'No HP harus berupa string',
            'no_hp.max'         => 'No HP tidak boleh lebih dari :max karakter',
            'materi.required'   => 'Materi tidak boleh kosong',
            'materi.string'     => 'Materi harus berupa string',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
            'jenis_kelamin.in'  => 'Jenis Kelamin harus l atau p',
        ];
    }
}
