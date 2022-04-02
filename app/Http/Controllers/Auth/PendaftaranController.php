<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('public.pendaftaran',[
            'title' => 'Pendaftaran Peserta'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request ->validate([
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'nik' => 'required|numeric',
            'tempat_lahir' => 'required|max:30',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|numeric',
            'alamat' => 'required|max:255',
            'email' => 'required',
            'no_hp' => 'required',
            'pendidikan_terakhir' => 'required',
            'nama_kejuruan' => 'require',
            'agama' => 'required',
            'status' => 'required',
            'tanggal_daftar' => 'required',
            'nip' => 'required',
            'angkatan' => 'required',
            'pekerjaan' => 'required'

        ]);
        Pendaftaran::create($validatedData);
        return redirect('/')->with('success', 'New post has been added!');
    }
}
