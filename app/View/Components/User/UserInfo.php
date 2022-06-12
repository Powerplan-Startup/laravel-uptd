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
        $kejuruan = $this->user->kejuruan;
        $jadwal = JadwalPelatihan::where('id_kejuruan', $kejuruan->id_kejuruan)->where('nomor_peserta', $this->user->nomor_peserta)->get();
        return view('components.user.user-info', [
            'user'          => $this->user,
            'jadwal'        => $jadwal,
            'kejuruan'      => $kejuruan
        ]);
    }
}
