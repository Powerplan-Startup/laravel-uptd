<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BeritaStoreRequest;
use App\Http\Requests\BeritaUpdateRequest;
use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
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

    public function update(BeritaUpdateRequest $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $data = collect($request->validated())->except(['cover']);

        $slug = Str::slug($data->get('judul'));
        $data->put('slug', $slug);

        if($request->file('cover')){
            $cover = $request->file('cover')->store('cover');
            $data->put('cover', $cover);
            $cover 
                && $berita->cover_url != null 
                && Storage::disk('public')->delete($berita->cover);
        }

        $result = $berita->update($data->all());
        return new Response(
            $berita, 
            $result 
                ? Response::HTTP_CREATED 
                : Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    public function destroy($id){
        $berita = Berita::findOrFail($id);
        $cover = $berita->cover; 
        $has_cover = $berita->cover_url;
        $result = $berita->delete();

        $result
            && $has_cover
            && Storage::disk('public')->delete($cover);

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
