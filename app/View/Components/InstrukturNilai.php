<?php

namespace App\View\Components;

use App\Models\CalonPesertaPelatihan;
use Illuminate\View\Component;

class InstrukturNilai extends Component
{
    private $peserta;

    public function __construct($id_paket = null)
    {
        $id_paket = $id_paket ?? request()->route('paket');
        $this->peserta = CalonPesertaPelatihan::where('id_paket', $id_paket)
            ->with(['nilai'])
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.instruktur-nilai')
            ->with('peserta', $this->peserta);
    }
}
