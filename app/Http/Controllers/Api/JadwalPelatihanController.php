<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JadwalPelatihanResource;
use App\Models\JadwalPelatihan;
use Illuminate\Http\Request;

class JadwalPelatihanController extends Controller
{
    public function index(){
        $data = JadwalPelatihan::when(request('sortBy'), function($query, $sorts){
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
        return JadwalPelatihanResource::collection($data);
    }

    public function store(Request $request){
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JadwalPelatihan  $jadwalPelatihan
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalPelatihan $jadwalPelatihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JadwalPelatihan  $jadwalPelatihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JadwalPelatihan $jadwalPelatihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadwalPelatihan  $jadwalPelatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JadwalPelatihan $jadwalPelatihan)
    {
        //
    }
}
