<?php

namespace App\Http\Controllers\Instruktur;

use App\Http\Controllers\Controller;
use App\Models\CalonPesertaPelatihan;
use App\Models\JadwalPelatihan;
use App\Models\Nilai;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function nilai($jadwal){
        $user = auth()->user();
        return view('instruktur.nilai', [
            'user'      => $user
        ]);
    }
    public function peserta($paket, $peserta){
        $user = auth()->user();
        return view('instruktur.nilai', [
            'user'      => $user,
            'peserta'   => CalonPesertaPelatihan::findOrFail($peserta)
        ]);
    }
    public function nilaiupdate(Request $request, $paket, $peserta){
        $user = auth()->user();

        $paket = Paket::findOrFail($paket);

        $data = $request->validate([
            'nilai_sikap_rerata'    => ['required', 'numeric', 'min:0'],
            'nilai_akademis_rerata' => ['required', 'numeric', 'min:0'],
        ]);

        $data = collect($data);

        $nilai = Nilai::updateOrCreate([
            "nomor_peserta" => $peserta,
            "id_paket" => $paket->id_paket
        ], $data->all());

        /**
         * update ranking
         * 
         */
        $subquery_rank = DB::table('nilai')->selectRaw('
                id_nilai, 
                row_number() over ( 
                    order by 
                        (nilai_sikap_rerata * nilai_sikap_bobot) + 
                        (nilai_akademis_rerata * nilai_akademis_bobot)
                    desc
                ) AS `rank`
            ')->whereRaw("id_paket = {$paket->id_paket}")->toSql();
        DB::table('nilai', 'a')
            ->rightJoinSub($subquery_rank, "rank_nilai", 'a.id_nilai', '=', 'rank_nilai.id_nilai')
            ->where("id_paket", $paket->id_paket)
            ->update([
                "ranking" => DB::raw("rank_nilai.rank")
            ]);

        if($nilai){
            return redirect()->route('instruktur.nilai', [
                'paket' => $paket->id_paket
            ]);
        }
        return back();
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
        /**
         * @var User $user
         * 
         */
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
