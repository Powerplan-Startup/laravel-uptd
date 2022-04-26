<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CalonPesertaPelatihan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PeseraController extends Controller
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
            'title' => 'Calon Peserta Pelatihan',
            'calonpeserta' => CalonPesertaPelatihan::get()
        ]);
    }
}
