<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalPelatihanStoreRequest;
use App\Http\Requests\JadwalPelatihanUpdateRequest;
use App\Http\Resources\JadwalPelatihanResource;
use App\Models\CalonPesertaPelatihan;
use App\Models\JadwalPelatihan;
use App\Models\Kejuruan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class JadwalPelatihanController extends Controller
{
    public function index(){
        $data = JadwalPelatihan::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->groupBy(['id_paket'])
        ->with(['kejuruan', 'instruktur'])
        ->when(request('search'), function($query, $search){
            $query->where('nama', 'like', "%{$search}%");
        })
        ->paginate(request('itemsPerPage') ?? 10);
        return JadwalPelatihanResource::collection($data);
    }

    public function store(JadwalPelatihanStoreRequest $request){

        $data = collect($request->validated())->except(['hari', 'tanggal', 'waktu', 'waktu_berakhir']);

        // @todo: remove comment later ✅

        $peserta = CalonPesertaPelatihan::where('id_kejuruan', $data['id_kejuruan'])
            // ->whereDoesntHave('jadwal')
            ->whereStatusPeserta('aktif')
            ->whereStatusBerkas('sudah')
            ->where('id_paket', $data->get('id_paket'))
            ->get();

        $jadwal = null;
        if($peserta->count() <= 0){
            /**
             * return http response with validation failed
             * 
             */
            return response()->json([
                'errors'    => [
                    'id_kejuruan' => [
                        'Kejuruan belum memiliki peserta'
                    ]
                ]
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        foreach ($request->hari as $i => $hari) {
            $jadwal = JadwalPelatihan::create([
                'nip'           => $data['nip'],
                'id_kejuruan'   => $data['id_kejuruan'],
                'hari'          => $hari,
                'tanggal'       => $request->tanggal[$i],
                'waktu'         => $request->waktu[$i],
                'waktu_berakhir'=> $request->waktu_berakhir[$i],
                'id_paket'      => $data['id_paket'],
                'pertemuan'     => $data['pertemuan']
            ]);
        }

        $collection = new JadwalPelatihanResource($jadwal);
        return new Response(
            $collection, 
            true 
                ? Response::HTTP_CREATED 
                : Response::HTTP_INTERNAL_SERVER_ERROR
        );

    }

    public function show($id){
        $jadwalPelatihan = JadwalPelatihan::with(['kejuruan', 'instruktur'])->findOrFail($id);
        $jadwalPelatihan->load(['jadwals' => function($query){
            $query->groupBy(['tanggal', 'waktu']);
        }]);
        return new JadwalPelatihanResource($jadwalPelatihan);
    }

    public function update(JadwalPelatihanUpdateRequest $request, $id){

        $jadwalPelatihan = JadwalPelatihan::findOrFail($id);

        $data = collect($request->validated())->except(['id_jadwal', 'hari', 'tanggal', 'waktu', 'waktu_berakhir']);

        /**
         * 6 buah jadwal dari 3 buah jadwal berbeda => 2 peserta
         * 
         * init:
         *      jumlah pertemuan awal
         *      jumlah peserta
         *      jumlah pertemuan yang diperbarui
         * 
         * 1. jadwal bertambah (jumlah pertemuan yang diperbarui >= jumlah pertemuan awal)
         *      looping id_jadwal update perubahan perubahan yang terjadi
         *         caranya: ambil salah satu jadwal 
         *      jika tidak memiliki id_jadwal maka dianggap jadwal baru dan ditambahkan setiap pengguna
         * 2. jadwal berkurang (jumlah pertemuan yang diperbarui < jumlah pertemuan awal)
         *      ambil salah satu jadwal, ambil jadwal lainnya yang berelasi
         *      looping jadwal lainnya
         *      update perubahan yang terjadi
         *      hapus jadwal yang tidak ada pada array id_jadwal
         * 
         */

        $jumlahPertemuanAwal = $jadwalPelatihan->pertemuan;
        $peserta = CalonPesertaPelatihan::where('id_kejuruan', $data['id_kejuruan'])
            // ->whereHas('jadwal')
            ->get();
        $jumlahPeserta = $peserta->count();
        $jumlahPertemuanYangDiperbarui = $data['pertemuan'];
        $result = false;

        if($jumlahPertemuanYangDiperbarui >= $jumlahPertemuanAwal){
            /**
             * looping id_jadwal jika kosong buat baru
             * 
             */
            foreach ($request->id_jadwal as $i => $id_jadwal) {
                if(!$id_jadwal){
                    $result = $jadwalPelatihan = JadwalPelatihan::create([
                        'nip'           => $data['nip'],
                        'id_kejuruan'   => $data['id_kejuruan'],
                        'hari'          => $request->hari[$i],
                        'tanggal'       => $request->tanggal[$i],
                        'waktu'         => $request->waktu[$i],
                        'waktu_berakhir'=> $request->waktu_berakhir[$i],
                        'id_paket'      => $data['id_paket'],
                        'pertemuan'     => $data['pertemuan'],
                    ]);
                }else{
                    $jadwal = JadwalPelatihan::where('id_jadwal', $id_jadwal)->first();
                    $result = $jadwal->update([
                        'nip'           => $data['nip'],
                        'id_kejuruan'   => $data['id_kejuruan'],
                        'hari'          => $request->hari[$i],
                        'tanggal'       => $request->tanggal[$i],
                        'waktu'         => $request->waktu[$i],
                        'waktu_berakhir'=> $request->waktu_berakhir[$i],
                        'id_paket'      => $data['id_paket'],
                        'pertemuan'     => $data['pertemuan']
                    ]);
                }
            }
        } else {
            /**
             * update jadwal yang lama
             * 
             */
            $jadwalPelatihan->load(['jadwals' => function($query){
                /**
                 * get id_jadwal only
                 * 
                 */
                $query->groupBy(['tanggal', 'waktu']);
            }]);
            foreach ($jadwalPelatihan->jadwals->pluck('id_jadwal') as $i => $id_jadwal) {
                $jadwal = JadwalPelatihan::where('id_jadwal', $id_jadwal)->first();
                /**
                 * cek jika $request->id jadwal tidak memiliki id_jadwal
                 * 
                 */
                if(!in_array($id_jadwal, $request->id_jadwal)){
                    /**
                     * hapus jadwal
                     * 
                     */
                    $result = $jadwal->delete();
                }else{
                    /**
                     * update perubahan
                     * 
                     */
                    $result = $jadwal->update([
                        'nip'           => $data['nip'],
                        'id_kejuruan'   => $data['id_kejuruan'],
                        'hari'          => $request->hari[$i],
                        'tanggal'       => $request->tanggal[$i],
                        'waktu'         => $request->waktu[$i],
                        'waktu_berakhir'=> $request->waktu_berakhir[$i],
                        'id_paket'      => $data['id_paket'],
                        'pertemuan'     => $data['pertemuan'],
                    ]);
                }
            }
        }
        return new Response(
            $jadwalPelatihan, 
            $result 
                ? Response::HTTP_CREATED 
                : Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    public function destroy($id){
        $jadwalPelatihan = JadwalPelatihan::findOrFail($id);
        $jadwalPelatihan->jadwals()->delete();
        try{
            $result = $jadwalPelatihan->delete();
        } catch (\Exception $e) {}
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
