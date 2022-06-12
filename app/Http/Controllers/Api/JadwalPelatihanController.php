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
        ->groupBy(['id_kejuruan', 'paket','nip'])
        ->with(['kejuruan', 'instruktur'])
        ->when(request('search'), function($query, $search){
            $query->where('nama', 'like', "%{$search}%");
        })
        ->paginate(request('itemsPerPage') ?? 10);
        return JadwalPelatihanResource::collection($data);
    }

    public function store(JadwalPelatihanStoreRequest $request){

        $data = collect($request->validated())->except(['hari', 'tanggal', 'waktu', 'waktu_berakhir']);

        $peserta = CalonPesertaPelatihan::where('id_kejuruan', $data['id_kejuruan'])
            ->whereDoesntHave('jadwal')
            ->whereStatusPeserta('aktif')
            ->whereStatusBerkas('sudah')
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

        $peserta->each(function($item, $key) use ($data, $request, &$jadwal){
            foreach ($request->hari as $i => $hari) {
                $jadwal = JadwalPelatihan::create([
                    'nip'           => $data['nip'],
                    'id_kejuruan'   => $data['id_kejuruan'],
                    'hari'          => $hari,
                    'tanggal'       => $request->tanggal[$i],
                    'waktu'         => $request->waktu[$i],
                    'waktu_berakhir'=> $request->waktu_berakhir[$i],
                    'paket'         => $data['paket'],
                    'pertemuan'     => $data['pertemuan'],
                    'judul'         => $data['judul'],
                    'nomor_peserta' => $item->nomor_peserta,
                ]);
            }
        });

        $collection = new JadwalPelatihanResource($jadwal);
        return new Response($collection, true ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);

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
                    $peserta->each(function($item, $key) use ($data, $request, &$jadwalPelatihan, &$result, $i){
                        $result = $jadwalPelatihan = JadwalPelatihan::create([
                            'nip'           => $data['nip'],
                            'id_kejuruan'   => $data['id_kejuruan'],
                            'hari'          => $request->hari[$i],
                            'tanggal'       => $request->tanggal[$i],
                            'waktu'         => $request->waktu[$i],
                            'waktu_berakhir'=> $request->waktu_berakhir[$i],
                            'paket'         => $data['paket'],
                            'pertemuan'     => $data['pertemuan'],
                            'judul'         => $data['judul'],
                            'nomor_peserta' => $item->nomor_peserta,
                        ]);
                    });
                }else{
                    $jadwal = JadwalPelatihan::where('id_jadwal', $id_jadwal)->first();
                    /**
                     * jadwal yang sama judul, tanggal, waktu, id_jurusan, dan paket
                     * 
                     */
                    $jadwal_sama = JadwalPelatihan::where('id_kejuruan', $jadwal->id_kejuruan)
                        ->where('hari', $jadwal->hari)
                        ->where('tanggal', $jadwal->tanggal)
                        ->where('waktu', $jadwal->waktu)
                        ->where('id_kejuruan', $jadwal->id_kejuruan)
                        ->where('paket', $jadwal->paket)
                        ->where('judul', $jadwal->judul);
                    /**
                     * update perubahan
                     * 
                     */
                    $result = $jadwal_sama->update([
                        'nip'           => $data['nip'],
                        'id_kejuruan'   => $data['id_kejuruan'],
                        'hari'          => $request->hari[$i],
                        'tanggal'       => $request->tanggal[$i],
                        'waktu'         => $request->waktu[$i],
                        'waktu_berakhir'=> $request->waktu_berakhir[$i],
                        'paket'         => $data['paket'],
                        'pertemuan'     => $data['pertemuan'],
                        'judul'         => $data['judul']
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
                 * jadwal yang sama judul, tanggal, waktu, id_jurusan, dan paket
                 * 
                 */
                $jadwal_sama = JadwalPelatihan::where('id_kejuruan', $jadwal->id_kejuruan)
                    ->where('hari', $jadwal->hari)
                    ->where('tanggal', $jadwal->tanggal)
                    ->where('waktu', $jadwal->waktu)
                    ->where('id_kejuruan', $jadwal->id_kejuruan)
                    ->where('paket', $jadwal->paket)
                    ->where('judul', $jadwal->judul);

                /**
                 * cek jika $request->id jadwal tidak memiliki id_jadwal
                 * 
                 */
                if(!in_array($id_jadwal, $request->id_jadwal)){
                    /**
                     * hapus jadwal
                     * 
                     */
                    $result = $jadwal_sama->delete();
                }else{
                    /**
                     * update perubahan
                     * 
                     */
                    $result = $jadwal_sama->update([
                        'nip'           => $data['nip'],
                        'id_kejuruan'   => $data['id_kejuruan'],
                        'hari'          => $request->hari[$i],
                        'tanggal'       => $request->tanggal[$i],
                        'waktu'         => $request->waktu[$i],
                        'waktu_berakhir'=> $request->waktu_berakhir[$i],
                        'paket'         => $data['paket'],
                        'pertemuan'     => $data['pertemuan'],
                        'judul'         => $data['judul']
                    ]);
                }
            }
        }
        return new Response($jadwalPelatihan, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy($id){
        $jadwalPelatihan = JadwalPelatihan::findOrFail($id);
        $jadwal_sama = JadwalPelatihan::where('id_kejuruan', $jadwalPelatihan->id_kejuruan)
            ->where('id_kejuruan', $jadwalPelatihan->id_kejuruan)
            ->where('paket', $jadwalPelatihan->paket)
            ->where('judul', $jadwalPelatihan->judul);

        $result = $jadwal_sama->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
