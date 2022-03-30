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

    public function show()
    {
        return view('public.blog-detail',[
            "title" => "Singel Post"
        ]);
    }
}