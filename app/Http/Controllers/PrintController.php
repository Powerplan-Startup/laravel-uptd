<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\JadwalPelatihan;
use App\Models\Kejuruan;
use Illuminate\Http\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Mpdf\Mpdf;

class PrintController extends Controller{
    public function peserta(){
        $kejuruan = Kejuruan::with(['peserta' => function($query){
            $query->whereStatusPeserta('aktif');
        }])->get();
        $view = view('print.peserta', [
            'kejuruan' => $kejuruan
        ]);
        $pdf = new Mpdf();
        $pdf->WriteHTML($view);
        $pdf->Output();
    }
    public function calon(){
        $kejuruan = Kejuruan::with(['peserta' => function($query){
            $query->whereStatusPeserta('calon');
        }])->get();
        $view = view('print.calon', [
            'kejuruan' => $kejuruan
        ]);
        $pdf = new Mpdf();
        $pdf->WriteHTML($view);
        $pdf->Output();
    }
    public function alumni(){
        $kejuruan = Kejuruan::with(['peserta' => function($query){
            $query->whereStatusPeserta('alumni');
        }])->get();
        $view = view('print.alumni', [
            'kejuruan' => $kejuruan
        ]);
        $pdf = new Mpdf();
        $pdf->WriteHTML($view);
        $pdf->Output();
    }
    public function instruktur(){
        $instruktur = Instruktur::all();

        $view = view('print.instruktur', [
            'instruktur' => $instruktur
        ]);

        $pdf = new Mpdf();
        $pdf->WriteHTML($view);
        $pdf->Output();
    }
    public function jadwal(){

        $data = JadwalPelatihan::groupBy(['id_kejuruan', 'paket','nip'])
        ->with(['kejuruan', 'instruktur', 'jadwals'])
        ->get();

        $view = view('print.jadwal', [
            'jadwal' => $data
        ]);
        
        $pdf = new Mpdf();
        $pdf->WriteHTML($view);
        $pdf->Output();
    }
}
