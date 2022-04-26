<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CalonPesertaPelatihan;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function peserta()
    {
        return view('public.peserta',[
            'title' => 'Daftar Peserta',
            'peserta' => CalonPesertaPelatihan::get()
        ]);
    }

    public function calonpeserta()
    {
        return view('public.calonpeserta',[
            'title' => 'Daftar Calon Peserta',
            'calonpeserta' => CalonPesertaPelatihan::get()
        ]);
    }
}
