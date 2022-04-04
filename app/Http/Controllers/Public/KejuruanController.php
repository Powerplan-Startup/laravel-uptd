<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Kejuruan;
use Illuminate\Http\Request;

class KejuruanController extends Controller
{
    public function index()
    {
        return view('public.kejuruan',[
            'title' => 'Kejuruan',
            'kejuruan' => Kejuruan::get()
        ]);
    }
}
