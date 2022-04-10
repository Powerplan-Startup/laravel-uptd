<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function blog($slug)
    {
        return view('public.blog-detail',[
            "title" => "Berita UPTD Latihan Kerja",
            "post" => Berita::find($slug)
        ]);
    }
}
