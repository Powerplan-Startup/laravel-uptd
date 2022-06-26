<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaStoreRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'judul'         => 'required|string|min:2',
            'deskripsi'     => 'required|string|max:191',
            'isi'           => 'required|string',
            'cover'         => 'required|image|file|max:2048'
        ];
    }
}
