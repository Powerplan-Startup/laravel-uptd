<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kejuruan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        ]);
        $result = $user->update($data);
        if($result){
            return redirect()->route('user.index');
        }
        return back();
    }
    public function berkas(){
        $user = auth()->user();
        return view('user.berkas', [
            'user'      => $user
        ]);
    }
    public function updateBerkas(Request $request){
        $user = auth()->user();
        $data = $request->validate([
            'foto'          => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'ktp'           => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'ijazah'        => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'kartu_vaksin'  => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);
        if($request->hasFile('foto')){
            /**
             * remove old file
             * 
             */
            if($user->foto && Storage::exists($user->foto)){
                Storage::delete($user->foto);
            }
            $user->foto = $data['foto']->store('foto', 'public');
        }
        if($request->hasFile('ktp')){
            /**
             * remove old file
             * 
             */
            if($user->ktp && Storage::exists($user->ktp)){
                Storage::delete($user->ktp);
            }
            $user->ktp = $data['ktp']->store('ktp', 'public');
        }
        if($request->hasFile('ijazah')){
            /**
             * remove old file
             * 
             */
            if($user->ijazah && Storage::exists($user->ijazah)){
                Storage::delete($user->ijazah);
            }
            $user->ijazah = $data['ijazah']->store('ijazah', 'public');
        }
        if($request->hasFile('kartu_vaksin')){
            /**
             * remove old file
             * 
             */
            if($user->kartu_vaksin && Storage::exists($user->kartu_vaksin)){
                Storage::delete($user->kartu_vaksin);
            }
            $user->kartu_vaksin = $data['kartu_vaksin']->store('kartu_vaksin', 'public');
        }
        $result = $user->save();
        if($result){
            return redirect()->route('user.berkas');
        }
        return back();
    }
}
