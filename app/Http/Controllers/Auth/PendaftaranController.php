<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Kejuruan;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('public.pendaftaran',[
            'title'     => 'Pendaftaran Peserta',
            'kejuruan'   => Kejuruan::all(),
        ]);
    }
}
