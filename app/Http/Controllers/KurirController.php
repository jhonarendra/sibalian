<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kurir;

class KurirController extends Controller
{

    public function getProfil($id){

    	$kurir = Kurir::find($id);

    	return $kurir;
    }

    public function updateProfil($id, Request $request){

        $apotek = Apotek::find($id);
        $apotek->nama = $request->nama_apotek;
        $apotek->alamat = $request->alamat;
        $apotek->telp = $request->telp;
        $apotek->save();

    	return response()->json([
            'message' => 'success'
        ]);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $login = Kurir::where('email',$request->email)->where('password', bcrypt($request->password))->exists();
        if($login){
            return response()->json([
                'message' => 'success'
            ])
        } else {
            return response()->json([
                'message' => 'failed'
            ])
        }
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $kurir = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'email' => $request->email,
            'password' => md5($request->password),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        Kurir::insert($kurir);
        return response()->json([
            'message' => 'failed'
        ]);
    }
}
