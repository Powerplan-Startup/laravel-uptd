<?php

namespace App\View\Components;

use App\Models\Paket;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class InstrukturPaket extends Component
{
    private $paket;
    public function __construct()
    {
        $instruktur = Auth::user();
        $this->paket = Paket::where('nip', $instruktur->nip)
            ->withCount(['peserta', 'nilai'])
            ->get();
    }

    public function render()
    {
        return view('components.instruktur-paket', [
            'paket' => $this->paket
        ]);
    }
}
