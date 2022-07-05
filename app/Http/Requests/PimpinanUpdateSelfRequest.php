<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PimpinanUpdateSelfRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules()
    {
        $id = auth()->user()->id;
        return [
            'nama'      => 'required|string|max:50',
            'username'  => 'required|string|max:30|unique:pimpinan,username,'.$id,
            'email'     => 'nullable|string|max:20|unique:pimpinan,email,'.$id,
            'password'  => 'nullable|string|confirmed|min:6',
        ];
    }
}
