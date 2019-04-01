<?php

namespace App\Http\Controllers\Lab;

use App\Lab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Hash;


use Auth;
class LabAuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    protected function login(){
        $credentials = request(['username', 'password']);

        if(! $token = auth('api-labs')->attempt($credentials)){
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
            'nama_lab' =>   ['required', 'string', 'max:191'],
            'telepon' =>    ['required', 'string', 'max:25', 'unique:lab'],
            'alamat' =>     ['required'],
            'username' =>   ['required', 'string', 'min:6'],
            'password' =>   ['required', 'string', 'min:6', 'confirmed'],
            'deskripsi' =>  ['required'],
            'id_kabupaten' => ['required'],
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
        return Lab::create([
            'nama_lab' => $data['nama_lab'],
            'telepon' => $data['telepon'],
            'alamat' => $data['alamat'],
            'username' => $data['username'],
            'deskripsi' => $data['deskripsi'],
            'id_kabupaten' => $data['id_kabupaten'],
            'password' => Hash::make($data['password']),
            

        ]);
    }
}
