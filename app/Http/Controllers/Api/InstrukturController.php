<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstrukturStoreRequest;
use App\Http\Requests\InstrukturUpdateRequest;
use App\Http\Resources\InstrukturResource;
use App\Models\Instruktur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InstrukturController extends Controller{
    public function index(){
        $data = Instruktur::when(request('sortBy'), function($query, $sorts){
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
        ->paginate(request('itemsPerPage') ?? 10);
        return InstrukturResource::collection($data);
    }

    public function store(InstrukturStoreRequest $request){
        $data = collect($request->validated())->except([]);
        $instruktur = Instruktur::create($data->all());
        $collection = new InstrukturResource($instruktur);
        return new Response($collection, $instruktur ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Instruktur $instruktur){
        return new InstrukturResource($instruktur);
    }

    public function update(InstrukturUpdateRequest $request, Instruktur $instruktur){
        $data = collect($request->validated())->except([]);
        $result = $instruktur->update($data->all());
        $collection = new InstrukturResource($instruktur);
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function destroy(Instruktur $instruktur){
        $result = $instruktur->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
