<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CalonPesertaPelatihan;
use App\Models\Kejuruan;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function peserta()
    {
        
        $kejuruan = Kejuruan::with(['paket', 'paket.alumni'])->paginate(50);

        return view('public.alumni',[
            'title' => 'Daftar Peserta',
            'kejuruan' => $kejuruan
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
