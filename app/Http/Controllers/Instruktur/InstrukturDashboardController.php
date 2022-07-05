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

        $data = $request->validate([
            'judul'         => ['required', 'string'],
            'materi'        => ['nullable', 'max:2048'],
        ]);
        $data = collect($data)->except(['materi']);
        if($request->hasFile('materi')){
            /**
             * remove old file
             * 
             */
            if($jadwal->materi && Storage::exists($jadwal->materi)){
                Storage::delete($user->materi);
            }
            $data->put('materi', $request->materi->store('materi', 'public'));
        }

        $result = $jadwal->update($data->all());
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
}
