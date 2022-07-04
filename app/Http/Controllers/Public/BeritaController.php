<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\JadwalPelatihan;

class BeritaController extends Controller
{
    public function index(){
        /**
         * where upcomming berita
         */
        $jadwal = JadwalPelatihan::orderBy('tanggal', 'asc') 
            ->groupBy(['id_kejuruan', 'tanggal', 'paket' ,'nip'])
            ->with(['kejuruan', 'instruktur'])
            ->whereDate('tanggal', '>=', date('Y-m-d'))
            ->paginate(10);
        return view('public.blog',[
            'title' => 'Berita',
            'posts' => Berita::all(),
            'jadwal' => $jadwal
        ]);
    }
    public function show($slug){
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $jadwal = JadwalPelatihan::orderBy('tanggal', 'asc') 
            ->groupBy(['id_kejuruan', 'tanggal', 'paket' ,'nip'])
            ->with(['kejuruan', 'instruktur'])
            ->whereDate('tanggal', '>=', date('Y-m-d'))
            ->paginate(10);
        return view('public.blog-info',[
            'title' => 'Berita',
            'post' => $berita,
            'jadwal' => $jadwal
        ]);
    }
}
