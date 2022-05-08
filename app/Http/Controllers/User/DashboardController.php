<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kejuruan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('user.index', [
            'user'      => $user
        ]);
    }
    public function setting(){
        $user = auth()->user();
        $kejuruan = Kejuruan::all();
        return view('user.setting', [
            'user'      => $user,
            'kejuruan'  => $kejuruan,
        ]);
    }
    public function update(Request $request){
        $user = auth()->user();
        $data = $request->validate([
            'nama'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:30', 'unique:peserta,email,'.$user->nomor_peserta.',nomor_peserta'],
            // 'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'jenis_kelamin' => ['required', 'string', 'in:l,p'],
            'nik'           => ['required', 'string', 'max:16', 'unique:peserta,nik,'.$user->nomor_peserta.',nomor_peserta'],
            'tempat_lahir'  => ['required', 'string', 'max:20'],
            'tanggal_lahir' => ['required', 'string', 'date'],
            'umur'          => ['required', 'numeric'],
            'alamat'        => ['required', 'string', 'max:30'],
            'no_hp'         => ['required', 'string', 'max:12'],
            'pendidikan_terakhir'   => ['required', 'string', 'max:10'],
            // 'id_kejuruan'   => ['required', 'exists:kejuruan'],
            'agama'         => ['required', 'in:islam,kristen,katolik,hindu,budha,konghucu'],
            'status'        => ['required', 'in:lajang,menikah,duda,janda'],
            'pekerjaan'     => ['required'],
        ]);
        $result = $user->update($data);
        if($result){
            return redirect()->route('user.index');
        }
        return back();
    }
}
