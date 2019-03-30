<?php

namespace App\Http\Controllers\Apotek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apotek;
use App\DetailObat;
use App\Obat;
use App\JenisObat;

class ApotekController extends Controller
{

    /**
        CRUD APOTEK START HERE
    */

    //fungsi untuk mengambil data profil apotek
    public function getProfil($id){

    	//find apotek via ID
    	$apotek = Apotek::find($id);

    	//check apotek found or not
    	return $apotek;
    }

    //fungsi update profil apotek
    public function updateProfil($id, Request $request){

        //get request data
        $nama_apotek = $request->nama_apotek;
        $alamat = $request->alamat;
        $telp = $request->telp;

        //find apotek with ID and updated it
        $apotek = Apotek::find($id);
        $apotek->nama_apotek = $nama_apotek;
        $apotek->alamat = $alamat;
        $apotek->telp = $telp;
        $apotek->save();

    	return response()->json([
            'message' => 'success'
        ]);
    }

    //fungsi menghapus data apotek
    public function deleteProfil($id){
        $apotek = Apotek::find($id);
        $apotek->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }

    /*
        CRUD APOTEK END HERE
    **/


    /**
        CRUD OBAT START HERE
    */

    //fungsi menambah obat pada tabel detail obat
    public function addObat($id, Request $request){

        //id_obat didapatkan dari list obat yg ditampilkan pada fungsi getNamaObat()
        $obat = new DetailObat([
            'id_obat' => $request->id_obat,
            'id_apotek' => $id,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        $obat->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    //menampilkan list obat yang dimiliki apotek dengan $id
    public function getObat($id){
        $obat = DetailObat::join('obats','detail_obats.id_obat','=','obats.id')
                            ->where('id_apotek',$id)
                            ->select('detail_obats.id as id_detail_obat','id_obat','nama_obat','stok','harga')
                            ->get();
        return $obat;
    }

    //fungsi update data obat
    public function updateObat($id, Request $request){
        $id_obat = $request->id_obat;
        $stok = $request->stok;
        $harga = $request->harga;

        $updated = DetailObat::where([['id_apotek','=',$id],
                                   ['id','=',$id_obat]])
                            ->update(['stok' => $stok, 'harga' => $harga]);


        if($updated){
            return response()->json([
                'message' => 'success'
            ]);
        } else {
            return response()->json([
                'message' => 'update failed'
            ]);
        }

    }


    /*
        CRUD OBAT END HERE
    **/


    /**
    NOTE :
        Fungsi dibawah merupakan fungsi yang digunakan untuk
        1. addNamaObat  = ketika nama obat yang akan diinputkan tidak tersedia di DetailObat
        2. getNamaObat  = menampilkan nama obat
        3. addJenisObat = menambahkan data jenis obat
        4. getJenisObat = menampilkan data jenis obat ketika akan menginputkan nama obat baru
    **/

    public function addNamaObat(Request $request){
        $namaObat = new Obat([
            'nama_obat' => $request->nama_obat,
            'id_jenis_obat' => $request->id_jenis_obat
        ]);
        $namaObat->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function getNamaObat(){
        $obat = Obat::join('jenis_obats','obats.id_jenis_obat','jenis_obats.id')
                    ->select('obats.id','nama_obat','id_jenis_obat','nama_jenis_obat')
                    ->get();

        return $obat;
    }

    public function addJenisObat(Request $request){
        $jenisObat = new JenisObat([
            'nama_jenis_obat' => $request->nama_jenis_obat
        ]);
        $jenisObat->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function getJenisObat(){
        $jenisObat = JenisObat::all();

        return $jenisObat;
    }
}
