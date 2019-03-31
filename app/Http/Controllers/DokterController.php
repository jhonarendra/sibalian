<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokter;
use App\Konsultasi;
use Validator;
use JWTFactory;
use JWTAuth;
use JWTAuthException;
use Illuminate\Support\Facades\Auth; 

class DokterController extends Controller
{
    //public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::join('kategori_dokter','dokter.id_kat','=','kategori_dokter.id_kat')->get();
        return response()->json($dokter);
    }

    //register api
    public function register(Request $request){
        $validator=Validator::make($request->all(), [
            'nama_dokter' => 'required', 'string', 'max:255',
            'ttl_dokter' => 'required','date',
            'alamat' => 'required', 'string', 'max:80',
            'telp' => 'required','string', 'max:12',
            'id_kategori' => 'required',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $dokter = Dokter::create($input);
        $token = JWTAuth::fromUser($dokter);

        return response()->json(compact('dokter','token'),201);
    }

    //login api
    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email' => 'required|string|email|max:255',
            'password'=> 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        \Config::set('jwt.user', 'App\Dokter'); 
        \Config::set('auth.providers.users.model', \App\Dokter::class);
        $credentials = $request->only('email', 'password');
        try {
            $token = JWTAuth::attempt($credentials);
            if (!$token) {
               return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
             return response()->json(['error' => 'could_not_create_token'], 400);
        }
        /*$token = null;
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }*/
       return response()->json(compact('token'),200);
    }

    //logout api

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getKonsultasi($id){
		$konsultasi = Konsultasi::join('users','konsultasis.id_user','=','users.id')
							  ->where('id_dokter', $id)
							  ->select('name', 'biaya_konsultasi','tgl_mulai','tgl_selesai','status')
							  ->get();
		return $konsultasi;
    }
    public function terimaKonsultasi(Request $request,$id, $id_dokter){
        // departure_time' => date("H:i:s", strtotime(request('departureTime')));
        $biaya = $request->biaya_konsultasi;
        // $tgl_mulai = $request->tgl_mulai;
        // $tgl_selesai = $request->tgl_selesai;
        $tgl_mulai = date("Y-m-d", strtotime(request('tgl_mulai')));
        $tgl_selesai = date("Y-m-d", strtotime(request('tgl_selesai')));
        $updated = Konsultasi::where([
                                    ['id', $id],
                                    ['id_dokter', $id_dokter] //menamplikan transaksi dengan status yg telah dibayar
                                ])->update(['status' => 'diterima', 'tgl_selesai' => $tgl_selesai, 'tgl_mulai'=>$tgl_mulai, 'biaya_konsultasi' =>$biaya  ]);
        if($updated){
            return response()->json([
                'message' => 'sukses di aprove'
            ]);
        } else {
            return response()->json([
                'message' => 'update failed'
            ]);
        }
    }
}
