<?php

namespace App\Http\Controllers\Instruktur;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstrukturDashboardController extends Controller
{
    
    public function index(){
        $user = auth()->user();
        return view('instruktur.index', [
            'user'      => $user
        ]);
    }
    public function materi($jadwal){
        $user = auth()->user();
        return view('instruktur.materi', [
            'user'      => $user
        ]);
    }
    public function materiupdate(Request $request, $jadwal){
        $user = auth()->user();
        $jadwal = JadwalPelatihan::findOrFail($jadwal);
        $jadwal->load(['samejadwals' => function($query){
            
        }]);

        $data = $request->validate([
            'judul'         => ['required', 'string'],
            'materi'        => ['nullable', 'max:2048'],
        ]);
        $data = collect($data)->except(['materi']);
        // if($request->hasFile('materi')){
        //     /**
        //      * remove old file
        //      * 
        //      */
        //     if($jadwal->materi && Storage::exists($jadwal->materi)){
        //         Storage::delete($user->materi);
        //     }
        //     $user->materi = $data['materi']->store('materi', 'public');
        // }

        $builder = JadwalPelatihan::whereIn('id_jadwal', $jadwal->samejadwals->pluck('id_jadwal')->toArray());
        $result = $builder->update($data->all());
        if($result){
            return view('instruktur.materi', [
                'user'      => $user
            ]);
        }
        return back();
    }
    public function setting(){
        $user = auth()->user();
        return view('instruktur.setting', [
            'user'      => $user
        ]);
    }
    public function update(Request $request){
        $user = auth()->user();
        $data = $request->validate([
            'nama'          => ['required', 'string', 'max:255'],
            'username'      => ['required', 'string', 'max:30', 'unique:instruktur,username,'.$user->nip.',nip'],
            // 'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'jenis_kelamin' => ['required', 'string', 'in:l,p'],
            'alamat'        => ['required', 'string', 'max:30'],
            'no_hp'         => ['required', 'string', 'max:12'],
        ]);
        $result = $user->update($data);
        if($result){
            return redirect()->route('instruktur.index');
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
