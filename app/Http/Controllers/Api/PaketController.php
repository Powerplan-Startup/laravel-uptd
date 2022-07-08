<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaketStoreRequest;
use App\Http\Requests\PaketUpdateRequest;
use App\Http\Resources\PaketResource;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaketController extends Controller
{
    public function index()
    {
        $data = Paket::when(request('sortBy'), function($query, $sorts){
                foreach ($sorts as $i => $sort) {
                    $query->orderBy($sort, 
                        request('sortDesc') 
                        && request('sortDesc')[$i] == 'true' 
                            ? 'DESC' 
                            : 'ASC' );
                }
            })
            ->when(request('search'), function($query, $search){
                $query->where('paket', 'like', "%{$search}%");
            })
            ->with(['kejuruan','instruktur'])
            ->paginate(request('itemsPerPage') ?? 10);
        return PaketResource::collection($data);
    }

    public function store(PaketStoreRequest $request){
        $data = collect($request->validated())->except([]);
        $kejuruan = Paket::create($data->all());
        $collection = new PaketResource($kejuruan);
        return new Response(
            $collection, 
            $kejuruan 
                ? Response::HTTP_CREATED 
                : Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    public function show(Paket $paket){
        $paket->load(['kejuruan', 'instruktur']);
        return new PaketResource($paket);
    }
    public function update(PaketUpdateRequest $request, Paket $paket){
        $data = collect($request->validated())->except([]);
        $result = $paket->update($data->all());
        $collection = new PaketResource($paket);
        return new Response(
            $collection, 
            $result 
                ? Response::HTTP_CREATED 
                : Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    public function destroy(Paket $paket)
    {
        $result = $paket->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
