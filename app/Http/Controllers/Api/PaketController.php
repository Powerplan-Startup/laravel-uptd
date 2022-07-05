<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaketStoreRequest;
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
            ->with(['kejuruan'])
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
