<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index(){
        return view('public.blog',[
            'title' => 'Berita',
            // 'posts' => Berita::all()
        ]);
    }
}
