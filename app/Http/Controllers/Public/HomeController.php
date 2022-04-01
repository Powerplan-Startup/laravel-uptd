<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.publichome',[
            "title" => "Beranda"
        ]);
    }

    public function alumni()
    {
        return view('public.public-alumni',[
            "title" => "Alumni"
        ]);
    }
    
    public function visimisi()
    {
        return view('public.public-visimisi',[
            "title" => "Visi Misi"
        ]);
    }
}
