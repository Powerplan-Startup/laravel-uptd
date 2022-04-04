<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Instruktur;
use Illuminate\Http\Request;

class InstrukturController extends Controller
{
    public function index()
    {
        return view('public.instruktur',[
            'title' => 'Instruktur',
            'instruktur' => Instruktur::get()
        ]);
    }
}
