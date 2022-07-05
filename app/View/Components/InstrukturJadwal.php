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
    {}

    public function render()
    {
        $jadwal = JadwalPelatihan::where('nip', auth()->user()->nip)
            ->with(['paket', 'paket.kejuruan', 'instruktur'])
            ->orderBy('tanggal', 'desc')
            ->get();
        return view('components.instruktur-jadwal', [
            'jadwal' => $jadwal
        ]);
    }
}
