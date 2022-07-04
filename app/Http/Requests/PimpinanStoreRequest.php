<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PimpinanStoreRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'nama'      => 'required|string|max:50',
            'username'  => 'required|string|max:30|unique:pimpinan,username',
            'email'     => 'nullable|string|max:20|unique:pimpinan,email',
            'password'  => 'required|string|confirmed|min:6',
        ];
    }
}
