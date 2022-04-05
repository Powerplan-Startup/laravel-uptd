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
            'title' => 'Jadwal Pelatihan',
            'jadwalpelatihan' => JadwalPelatihan::get()
        ]);
    }
}
