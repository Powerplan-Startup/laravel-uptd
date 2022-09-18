<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CalonPesertaPelatihan;
use App\Models\Kejuruan;
use App\Models\Paket;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $kejuruan = Kejuruan::whereHas('paket', function($query){
            $query->whereDate('tanggal_daftar_mulai', '<=', date('Y-m-d'))
                ->whereDate('tanggal_daftar_selesai', '>=', date('Y-m-d'));
        })->get();
        return view('auth.register', [
            'kejuruan'   => $kejuruan,
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:30', 'unique:peserta'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'jenis_kelamin' => ['required', 'string', 'in:l,p'],
            'nik'           => ['required', 'string', 'max:16', function ($attribute, $value, $fail) {
                /**
                 * find if nik is already registered in this year
                 * 
                 */
                $peserta = CalonPesertaPelatihan::where('nik', $value)
                    // ->whereYear('tanggal_daftar', now()->year())
                    ->first();
                if ($peserta) {
                    return $fail('NIK sudah terdaftar');
                }
            }],
            'tempat_lahir'  => ['required', 'string', 'max:20'],
            'tanggal_lahir' => ['required', 'string', 'date'],
            'umur'          => ['required', 'numeric'],
            'alamat'        => ['required', 'string', 'max:30'],
            'no_hp'         => ['required', 'string', 'max:12'],
            'pendidikan_terakhir'   => ['required', 'string', 'max:10'],
            'id_kejuruan'   => ['required', 'exists:kejuruan'],
            'agama'         => ['required', 'in:islam,kristen,katolik,hindu,budha,konghucu'],
            'status'        => ['required', 'in:lajang,menikah,duda,janda'],
            'foto'          => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            /**
             * ktp image or pdf
             * ijazah image or pdf
             * kartu vaksin image or pdf
             * 
             */
            'ktp'           => ['required', 'image', 'mimes:jpeg,png,jpg,gif,pdf', 'max:2048'],
            'ijazah'        => ['required', 'image', 'mimes:jpeg,png,jpg,gif,pdf', 'max:2048'],
            'kartu_vaksin'  => ['required', 'image', 'mimes:jpeg,png,jpg,gif,pdf', 'max:2048'],
            
            // 'pekerjaan'     => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        /**
         * nama, jenis kelamin, nik, tempat lahir, tanggal lahir, umur, alamat, email, no hp, pendidikan terakhir, nama kejuruan, agama, status, tanggal daftar, nip, angkatan, pekerjaan
         */
        $kejuruan = Kejuruan::where('id_kejuruan', $data['id_kejuruan'])->first();
        $id_paket = Paket::where('id_kejuruan', $kejuruan->id_kejuruan)->where('tahun', date('Y'))->first()->id_paket;
        
        // $nip = optional($kejuruan->jadwal)->nip;
        $tanggal_daftar = now()->format('Y-m-d');
        
        $result = CalonPesertaPelatihan::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'nik' => $data['nik'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'umur' => $data['umur'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'pendidikan_terakhir' => $data['pendidikan_terakhir'],
            'id_paket' => $id_paket,
            'agama' => $data['agama'],
            'status' => $data['status'],
            // 'nip' => $nip, // ??
            'angkatan' => now()->format('Y'),
            'tanggal_daftar' => $tanggal_daftar
        ]);
        if($result){
            $result->foto = $data['foto']->store('foto', 'public');
            $result->ktp = $data['ktp']->store('ktp', 'public');
            $result->ijazah = $data['ijazah']->store('ijazah', 'public');
            $result->kartu_vaksin = $data['kartu_vaksin']->store('kartu_vaksin', 'public');
            $result->save();
        }
        return $result;
    }
    
    protected function guard(){
        return Auth::guard();
    }
}
