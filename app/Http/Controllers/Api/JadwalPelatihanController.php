<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalPelatihanStoreRequest;
use App\Http\Requests\JadwalPelatihanUpdateRequest;
use App\Http\Resources\JadwalPelatihanResource;
use App\Models\JadwalPelatihan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        ->with(['kejuruan', 'instruktur'])
        ->when(request('search'), function($query, $search){
            $query->where('nama', 'like', "%{$search}%");
        })
        ->paginate(request('itemsPerPage') ?? 10);
        return JadwalPelatihanResource::collection($data);
    }

    public function store(JadwalPelatihanStoreRequest $request){
        $data = collect($request->validated())->except([]);
        $jadwal = JadwalPelatihan::create($data->all());
        $collection = new JadwalPelatihanResource($jadwal);
        return new Response($collection, $jadwal ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show($id){
        $jadwalPelatihan = JadwalPelatihan::findOrFail($id);
        return new JadwalPelatihanResource($jadwalPelatihan);
    }

    public function update(JadwalPelatihanUpdateRequest $request, $id){
        $jadwalPelatihan = JadwalPelatihan::findOrFail($id);
        $data = collect($request->validated())->except([]);
        $result = $jadwalPelatihan->update($data->all());
        $collection = new JadwalPelatihanResource($jadwalPelatihan);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(JadwalPelatihan $jadwalPelatihan){
    }
}
