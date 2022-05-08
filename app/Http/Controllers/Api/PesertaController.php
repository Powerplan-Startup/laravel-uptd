<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PesertaResource;
use App\Models\CalonPesertaPelatihan;
use Illuminate\Http\Request;

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
        ->with(['kejuruan'])
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
        $calonPesertaPelatihan->load(['kejuruan', 'instruktur']);
        return new PesertaResource($calonPesertaPelatihan);
    }

    public function update(Request $request, CalonPesertaPelatihan $calonPesertaPelatihan){
    }

    public function destroy(CalonPesertaPelatihan $calonPesertaPelatihan){
    }
}
