<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function create(){
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Pimpinan $pimpinan){
        return new PimpinanResource($pimpinan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pimpinan $pimpinan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pimpinan $pimpinan)
    {
        //
    }

    public function destroy(Pimpinan $pimpinan)
    {
        $result = $pimpinan->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
