<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalPelatihanStoreRequest;
use App\Http\Requests\JadwalPelatihanUpdateRequest;
use App\Http\Resources\JadwalPelatihanResource;
use App\Models\JadwalPelatihan;
use App\Models\Kejuruan;
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
        if($jadwal && $request->has('id_kejuruan')){
            $kejuruan = Kejuruan::find($request->id_kejuruan);
            $kejuruan->id_jadwal = $jadwal->id_jadwal;
            $kejuruan->save();
        }
        $collection = new JadwalPelatihanResource($jadwal);
        return new Response($collection, $jadwal ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show($id){
        $jadwalPelatihan = JadwalPelatihan::with(['kejuruan', 'instruktur'])->findOrFail($id);
        return new JadwalPelatihanResource($jadwalPelatihan);
    }

    public function update(JadwalPelatihanUpdateRequest $request, $id){
        $jadwalPelatihan = JadwalPelatihan::findOrFail($id);
        $data = collect($request->validated())->except([]);
        $result = $jadwalPelatihan->update($data->all());
        if($result && $request->has('id_kejuruan')){
            $kejuruan = Kejuruan::find($request->id_kejuruan);
            $kejuruan->id_jadwal = $jadwalPelatihan->id_jadwal;
            $kejuruan->save();
        }
        $collection = new JadwalPelatihanResource($jadwalPelatihan);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy($id){
        $jadwalPelatihan = JadwalPelatihan::findOrFail($id);
        $result = $jadwalPelatihan->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
