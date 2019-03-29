<?php

namespace App\Http\Controllers\DokterAuth;

use App\Dokter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\KategoriDokter;

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
    protected $redirectTo = '/dokter';

    public function showRegistrationForm()
    {
        $kategoridokter = KategoriDokter::all();
        return view('dokter-auth.register', compact('kategoridokter'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
        return auth()->guard('dokter');
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
            'nama_dokter' => ['required', 'string', 'max:255'],
            'ttl_dokter' => ['required','date'],
            'alamat' => ['required', 'string', 'max:80'],
            'telp' => ['required','string', 'max:12'],
            'id_kategori' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Dokter::create([
            'nama_dokter' => $data['nama_dokter'],
            'ttl_dokter' => $data['ttl_dokter'],
            'id_kategori' => $data['id_kategori'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'telp' => $data['telp'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
