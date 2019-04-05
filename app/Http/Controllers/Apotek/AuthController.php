<?php

namespace App\Http\Controllers\Apotek;

use App\Apotek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Hash;


use Auth;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    protected function login(){
        $credentials = request(['email', 'password']);

        if(! $token = auth('api-apotek')->attempt($credentials)){
            return response()->json([
    
                'msg'           => 'gagal login',
                'access_token'  => null,
                'error'         => 'password atau username salah',
            ],401);

        }
        // if (! $token = auth()->attempt($credentials)) {

        //     return response()->json([
    
        //         'msg'           => 'gagal login',
        //         'access_token'  => null,
        //         'error'         => 'password atau username salah',
        //     ],401);

        // }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {

        return response()->json([
           
            'msg'           => 'berhasil login',
            'access_token'  => $token,
            'error'         => null,
        ],200);


         return $res;


    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'nama_apotek' =>   ['required', 'string', 'max:191'],
            'telp' =>    ['required', 'string', 'max:25'],
            'alamat' =>     ['required'],
            'email' =>   ['required', 'string', 'min:6'],
            'password' =>   ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status'        => false,
                'msg'           => 'input salah',
                'access_token'  => null,
                'error'         => $validator->messages(),
            ],400);
        }


        try{
            $usr = $this->create($request->all());
            $login_respon = $this->login();

            return $login_respon->original;
        }catch(Illuminate\Database\QueryException $e){

            return response()->json([
                'status'        => false,
                'msg'           => 'error insert data',
                'access_token'  => null,
                'error'         =>'Error !!!',
            ],400);
        }


    } 
    protected function create(array $data)
    {
        return Apotek::create([
            'nama_apotek' => $data['nama_apotek'],
            'telp' => $data['telp'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            

        ]);
    }
}
