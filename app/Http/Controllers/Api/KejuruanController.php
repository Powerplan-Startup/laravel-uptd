<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\KejuruanStoreRequest;
use App\Http\Requests\KejuruanUpdateRequest;
use App\Http\Resources\KejuruanResource;
use App\Models\Kejuruan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KejuruanController extends Controller
{
    public function index(){
        $data = Kejuruan::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->when(request('search'), function($query, $search){
            $query->where('nama_kejuruan', 'like', "%{$search}%");
        })
        ->with(['paket.jadwals', 'paket.instruktur'])
        ->paginate(request('itemsPerPage') ?? 10);
        return KejuruanResource::collection($data);
    }

    public function store(KejuruanStoreRequest $request){
        $data = collect($request->validated())->except([]);
        $kejuruan = Kejuruan::create($data->all());
        $collection = new KejuruanResource($kejuruan);
        return new Response($collection, $kejuruan ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Kejuruan $kejuruan){
        $kejuruan->load(['paket', 'paket.jadwal', 'paket.instruktur']);
        return new KejuruanResource($kejuruan);
    }

    public function update(KejuruanUpdateRequest $request, Kejuruan $kejuruan){
        $data = collect($request->validated())->except([]);
        $result = $kejuruan->update($data->all());
        $collection = new KejuruanResource($kejuruan);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(Kejuruan $kejuruan){
        $result = $kejuruan->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
