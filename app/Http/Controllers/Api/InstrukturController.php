<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstrukturStoreRequest;
use App\Http\Requests\InstrukturUpdateRequest;
use App\Http\Resources\InstrukturResource;
use App\Models\Instruktur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
        $data = collect($request->validated())->except(['foto']);
        $data['password'] = bcrypt($data['password']);
        $instruktur = Instruktur::create($data->all());
        $collection = new InstrukturResource($instruktur);
        if($request->file('foto')){
            $foto = $request->file('foto')->store('foto');
            $instruktur->update(['foto' => $foto]);
        }
        return new Response($collection, $instruktur ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(Instruktur $instruktur){
        return new InstrukturResource($instruktur);
    }

    public function update(InstrukturUpdateRequest $request, Instruktur $instruktur){
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
        $result = $instruktur->update($data->all());
        $collection = new InstrukturResource($instruktur);
        if($request->file('foto')){
            /**
             * delete old foto
             * 
             */
            if($instruktur->foto){
                Storage::delete($instruktur->foto);
            }
            $foto = $request->file('foto')->store('foto');
            $instruktur->update(['foto' => $foto]);
        }
        return new Response($collection, $result ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function destroy(Instruktur $instruktur){
        $result = $instruktur->delete();
        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
