<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\JadwalPelatihan;
use App\Models\Kejuruan;
use App\Models\Pimpinan;
use Illuminate\Http\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Mpdf\Mpdf;

class PrintController extends Controller{
    public function peserta(){
        $kejuruan = Kejuruan::with([ 'paket' => function(){}, 'paket.peserta' => function($query){
            $query->whereStatusPeserta('aktif');
        }])->get();
        $pimpinan = Pimpinan::first();

        $view = view('print.peserta', [
            'kejuruan' => $kejuruan,
            'pimpinan'  => $pimpinan
        ]);
        $pdf = new Mpdf();
        $pdf->WriteHTML($view);
        $pdf->Output();
    }
    public function calon(){
        $kejuruan = Kejuruan::with(['paket', 'paket.peserta' => function($query){
            $query->whereStatusPeserta('calon');
        }])->get();
        $pimpinan = Pimpinan::first();
        $view = view('print.calon', [
            'kejuruan' => $kejuruan,
            'pimpinan'  => $pimpinan
        ]);
        $pdf = new Mpdf();
        $pdf->WriteHTML($view);
        $pdf->Output();
    }
    public function alumni(){
        $kejuruan = Kejuruan::with(['paket', 'paket.peserta' => function($query){
            $query->whereStatusPeserta('alumni');
        }])->get();
        $pimpinan = Pimpinan::first();
        $view = view('print.alumni', [
            'kejuruan' => $kejuruan,
            'pimpinan'  => $pimpinan
        ]);
        $pdf = new Mpdf();
        $pdf->WriteHTML($view);
        $pdf->Output();
    }
    public function instruktur(){
        $instruktur = Instruktur::all();

        $pimpinan = Pimpinan::first();
        $view = view('print.instruktur', [
            'instruktur' => $instruktur,
            'pimpinan'  => $pimpinan
        ]);

        $pdf = new Mpdf();
        $pdf->WriteHTML($view);
        $pdf->Output();
    }
    public function jadwal(){

        $data = JadwalPelatihan::groupBy(['id_paket'])
        ->with(['paket', 'paket.kejuruan', 'instruktur', 'jadwal'])
        ->get();

        $pimpinan = Pimpinan::first();
        $view = view('print.jadwal', [
            'jadwal' => $data,
            'pimpinan'  => $pimpinan
        ]);
        
        $pdf = new Mpdf();
        $pdf->WriteHTML($view);
        $pdf->Output();
    }
}
