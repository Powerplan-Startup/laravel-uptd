<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PesertaResource;
use App\Models\CalonPesertaPelatihan;
use Illuminate\Http\Request;

class CountController extends Controller{
    public function peserta(){
        return new PesertaResource([
            'count' => CalonPesertaPelatihan::when(
                request()->filled('status'), 
                fn ($query) => $query->where('status_peserta', request()->status)
            )->count()
        ]);
    }
}
