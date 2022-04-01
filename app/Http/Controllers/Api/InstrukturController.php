<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstrukturStoreRequest;
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
            $query->where('nama_kejuruan', 'like', "%{$search}%");
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instruktur  $instruktur
     * @return \Illuminate\Http\Response
     */
    public function show(Instruktur $instruktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instruktur  $instruktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instruktur $instruktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instruktur  $instruktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instruktur $instruktur)
    {
        //
    }
}
