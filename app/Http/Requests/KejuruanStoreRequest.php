<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KejuruanStoreRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules()
    {
        return [
            'nama_kejuruan' => 'required|string|max:30|unique:kejuruan,nama_kejuruan',
            'paket' => 'required|numeric|min:1',
        ];
    }
    public function messages()
    {
        /**
         * return with indonesian message
         * 
         */
        return [
            'nama_kejuruan.required' => 'Nama kejuruan harus diisi',
            'nama_kejuruan.string' => 'Nama kejuruan harus berupa string',
            'nama_kejuruan.max' => 'Nama kejuruan maksimal 30 karakter',
            'nama_kejuruan.unique' => 'Nama kejuruan sudah ada',
            'paket.required' => 'Paket harus diisi',
            'paket.numeric' => 'Paket harus berupa angka',
            'paket.min' => 'Paket minimal 1',
        ];
    }
}
