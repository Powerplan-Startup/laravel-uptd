<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesertaUpdateRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'status_peserta' => 'required|in:aktif,tidak_aktif,calon,alumni'
        ];
    }
}
