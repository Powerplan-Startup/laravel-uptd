<?php

namespace App\View\Components;

use App\Models\JadwalPelatihan;
use Illuminate\View\Component;

class InstrukturJadwal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $jadwal = JadwalPelatihan::where('nip', auth()->user()->nip)
            ->groupBy(['tanggal', 'paket', 'nip'])
            ->with(['kejuruan', 'instruktur'])
            ->orderBy('tanggal', 'desc')
            ->get();
        return view('components.instruktur-jadwal', [
            'jadwal' => $jadwal
        ]);
    }
}
