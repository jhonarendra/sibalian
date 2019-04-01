<?php

namespace App\Http\Controllers\Lab;

use App\tarif_cek_lab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LabController extends Controller
{
    //
    /**
        input cek lab untuk memasukan data tarif cek lab
     */
    public function inputCekLab(Request $request){
        $tarif_lab = new tarif_cek_lab;

        $this->validate($request,[
            'nama_cek_lab' => ['required','string','min:10'],
            'harga' => ['required','numeric'],
            'deskripsi' => ['required','string'],
            'status_cek_lab' =>  ['required'],

        ]);

        $tarif_lab->nama_cek_lab = $request->nama_cek_lab;
        $tarif_lab->harga = $request->harga;
        $tarif_lab->deskripsi = $request->deskripsi;
        $tarif_lab->id_lab = $this->getCredentialId();
        $tarif_lab->status_cek_lab = $request->status_cek_lab;

        $tarif_lab->save();

        return response()->json(['message'=>'success'],200);


    }

    public function showListCekLab(){
        try{
            $cekLabs = DB::table('tarif_cek_lab')->join('lab','tarif_cek_lab.id_lab','=','lab.id');
        }catch(Illuminate\Database\QueryException $e){
            return response()->json([
                'data' => null,
                'message'=>'failed'
            ],400);
        }
      
        return response()->json([
            'data' => $cekLabs,
            'message'=>'success'
        ],200);

    }

    public function editCekLab($id, Request $request){
        $this->validate($request,[
            'nama_cek_lab' => ['required','string','min:10'],
            'harga' => ['required','numeric'],
            'deskripsi' => ['required','string'],
            'status_cek_lab' =>  ['required'],

        ]);
        $tarif_lab = tarif_cek_lab::find($id);

        $tarif_lab->nama_cek_lab = $request->nama_cek_lab;
        $tarif_lab->harga = $request->harga;
        $tarif_lab->deskripsi = $request->deskripsi;
        $tarif_lab->id_lab = $this->getCredentialId();
        $tarif_lab->status_cek_lab = $request->status_cek_lab;

        $tarif_lab->save();

        return response()->json(['message'=>'success'],200);

    }

    public function daftarBooking(){
        
    }

    protected function getCredentialId(){

        $cred = auth('api_labs')->user()->id;

        return $cred;

    }
}
