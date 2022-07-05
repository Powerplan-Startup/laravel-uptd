<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PesertaUpdateRequest;
use App\Http\Resources\PesertaResource;
use App\Models\CalonPesertaPelatihan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PesertaController extends Controller
{
    public function index(){
        $data = CalonPesertaPelatihan::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->when(request('search'), function($query, $search){
            $query->where('nama', 'like', "%{$search}%");
        })
        ->when(request('status'), function($query, $search){
            $query->whereIn('status_peserta', $search);
        })
        ->when(request('id_kejuruan'), function($query, $search){
            $query->whereHas('paket', function($query) use ($search){
                $query->where('id_kejuruan', $search);
            });
        })
        ->with(['paket', 'paket.kejuruan'])
        ->paginate(request('itemsPerPage') ?? 10);
        /**
         * TODO tambah status
         */
        return PesertaResource::collection($data);
    }

    public function store(Request $request){
    }

    public function show($id){
        $calonPesertaPelatihan = CalonPesertaPelatihan::where('nomor_peserta', $id)->firstOrFail();
        $calonPesertaPelatihan->load(['paket', 'paket.kejuruan', 'paket.instruktur']);
        return new PesertaResource($calonPesertaPelatihan);
    }

    public function update(PesertaUpdateRequest $request, $id){
        $peserta = CalonPesertaPelatihan::where('nomor_peserta', $id)->firstOrFail();
        $data = collect($request->validated())->except([]);
        if($data->get('status_peserta') == 'aktif'){
            $data->put('status_berkas', 'sudah');
        } else
        if($data->get('status_peserta') == 'calon'){
            $data->put('status_berkas', 'belum');
        }
        $result = $peserta->update($data->all());
        $collection = new PesertaResource($peserta);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(CalonPesertaPelatihan $calonPesertaPelatihan){
    }
}
