<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelatihan;
use Illuminate\Http\Request;

class JadwalplthnController extends Controller
{
    public function index()
    {
        return view('public.jadwal-pelatihan',[
            'title' => 'Data Jadwal Pelatihan',
            'datajadwalpelatihan' => JadwalPelatihan::get()
        ]);
    }
    public function jadwal()
    {
        return view('public.jadwal', [
            'title' => 'Jadwal Pelatihan',
            'jadwalpelatihan' => JadwalPelatihan::get()
        ]);
    }
}
