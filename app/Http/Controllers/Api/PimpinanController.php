<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PimpinanStoreRequest;
use App\Http\Requests\PimpinanUpdateRequest;
use App\Http\Resources\PimpinanResource;
use App\Models\Pimpinan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PimpinanController extends Controller
{
    public function index()
    {
        $data = Pimpinan::when(request('sortBy'), function($query, $sorts){
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
        return PimpinanResource::collection($data);
    }

    public function store(PimpinanStoreRequest $request){
        $data = collect($request->validated())->except([]);
        $data['password'] = bcrypt($data['password']);
        $pimpinan = Pimpinan::create($data->all());
        $collection = new PimpinanResource($pimpinan);
        return new Response(
            $collection, 
            $pimpinan 
                ? Response::HTTP_CREATED 
                : Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    public function show(Pimpinan $pimpinan){
        return new PimpinanResource($pimpinan);
    }

    public function update(PimpinanUpdateRequest $request, Pimpinan $pimpinan)
    {
        $data = collect($request->validated())->except([]);
        /**
         * check if password no null then hash it
         * 
         */
        if($data->has('password')){
            $data['password'] = bcrypt($data['password']);
        } else {
            $data->forget('password');
        }
        $result = $pimpinan->update($data->all());
        $collection = new PimpinanResource($pimpinan);
        return new Response(
            $collection, 
            $result 
                ? Response::HTTP_CREATED 
                : Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    public function destroy(Pimpinan $pimpinan)
    {
        $result = $pimpinan->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
