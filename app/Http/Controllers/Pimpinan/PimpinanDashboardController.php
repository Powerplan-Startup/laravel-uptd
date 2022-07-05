<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Http\Requests\PimpinanUpdateRequest;
use App\Http\Requests\PimpinanUpdateSelfRequest;
use Illuminate\Http\Request;

class PimpinanDashboardController extends Controller
{
    
    public function index(){
        $user = auth()->user();
        return view('pimpinan.index', [
            'user'      => $user
        ]);
    }
    public function setting(){
        $user = auth()->user();
        return view('pimpinan.setting', [
            'user'      => $user,
        ]);
    }
    public function update(PimpinanUpdateSelfRequest $request){
        $user = auth()->user();
        $data = $request->validated();
        $result = $user->update($data);
        if($result){
            return redirect()->route('pimpinan.index');
        }
        return back();
    }
}
