<?php

namespace App\View\Components\User;

use App\Models\JadwalPelatihan;
use Illuminate\View\Component;

class UserInfo extends Component
{
    private $user;
    public function __construct($user){
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $kejuruan = optional($this->user->paket)->kejuruan;
        $paket = $this->user->paket;
        $jadwal = null;
        if(optional($paket)->id_paket){
            $jadwal = JadwalPelatihan::where('id_paket', optional($paket)->id_paket)
                ->with(['paket', 'paket.kejuruan', 'instruktur'])
                ->get();
        }
        return view('components.user.user-info', [
            'user'          => $this->user,
            'jadwal'        => $jadwal,
            'kejuruan'      => $kejuruan
        ]);
    }
}
