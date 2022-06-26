<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaUpdateRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){

        $id = $this->route('beritum');

        return [
            'judul'         => 'required|string|min:2',
            'deskripsi'     => 'required|string|max:191',
            'isi'           => 'required|string',
            'cover'         => 'nullable|image|file|max:2048'
        ];
    }
}
