<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BeritaStoreRequest;
use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::when(request('sortBy'), function($query, $sorts){
            foreach ($sorts as $i => $sort) {
                $query->orderBy($sort, 
                    request('sortDesc') 
                    && request('sortDesc')[$i] == 'true' 
                        ? 'DESC' 
                        : 'ASC' );
            }
        })
        ->when(request('search'), function($query, $search){
            $query->where('judul', 'like', "%{$search}%");
        })
        ->paginate(request('itemsPerPage') ?? 10);
        return BeritaResource::collection($data);
    }

    public function store(BeritaStoreRequest $request){
        
        $data = collect($request->validated())->except(['cover']);

        $slug = Str::slug($data->get('judul'));
        $data->put('slug', $slug);

        if($request->file('cover')){
            $cover = $request->file('cover')->store('cover');
            $data->put('cover', $cover);
        }

        $berita = Berita::create($data->all());

        $collection = new BeritaResource($berita);
        return new Response($collection, true ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);

    }

    public function show($id){
        $berita = Berita::findOrFail($id);
        return new BeritaResource($berita);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        //
    }
}
