<?php

namespace App\Http\Controllers\Apotek;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderObat;
use App\DetailOrderObat;

class PesananController extends Controller
{
    //list transaksi pesanan obat oleh user yang telah membayar
	public function getPesanan($id){
		$transaksi = OrderObat::join('users','order_obats.id_user','=','users.id')
							  ->where([
							  			['id_apotek', $id],
							  			['status', 'bayar'] //menamplikan transaksi dengan status yg telah dibayar
									  ])
							  ->select('order_obats.id as id_order', 'total', 'users.name', 'status')
							  ->get();
		return $transaksi;

	}

	//menampilkan detail transaksi yang dipilih
	public function detailPesanan($id_apotek, $id_order){
		$detail = DetailOrderObat::join('detail_obats','detail_order_obats.id_detail_obat','=','detail_obats.id')
								 ->join('obats','detail_obats.id_obat','=','obats.id')
								 ->where('id_order_obat', $id_order)
								 ->select('nama_obat', 'jumlah_obat')
								 ->get();
		return $detail;
	}

	//fungsi ketika pesanan diterima oleh apotek
	public function terimaPesanan($id_apotek, $id_order){
		$transaksi = OrderObat::where('id', $id_order)
							  ->update(['status' => 'diproses']);

		if($transaksi){
            return response()->json([
                'message' => 'pesanan diterima'
            ]);
        } else {
            return response()->json([
                'message' => 'update failed'
            ]);
        }
	}

	//fungsi ketika pesanan ditolak
	// public function tolakPesanan($id_apotek, $id_order){
	// 	$transaksi = OrderObat::where('id', $id_order)
	// 						  ->update(['status' => 'pesanan ditolak']);

	// 	if($transaksi){
    //         return response()->json([
    //             'message' => 'pesanan ditolak'
    //         ]);
    //     } else {
    //         return response()->json([
    //             'message' => 'update failed'
    //         ]);
    //     }
	// }

	//fungsi menampilkan pesanan yang sedang diproses
	public function getPesananProses($id){
		$transaksi = OrderObat::join('users','order_obats.id_user','=','users.id')
							  ->where([
							  			['id_apotek', $id],
							  			['status', 'diproses'] //menamplikan transaksi dengan status yg telah dibayar
									  ])
							  ->select('order_obats.id as id_order', 'total', 'users.name', 'status')
							  ->get();
		return $transaksi;
	}

	//fungsi update status pesanan ketika pesanan selesai diproses dan menunggu pengambilan dari ojek
	public function prosesPesananSelesai($id_apotek, $id_order){
		$transaksi = OrderObat::where('id', $id_order)
							  ->update(['status' => 'menunggu ojek']);

		if($transaksi){
            return response()->json([
                'message' => 'pesanan menunggu ojek'
            ]);
        } else {
            return response()->json([
                'message' => 'update failed'
            ]);
        }
	}

	//menampilkan history pesanan yang telah selesai
	public function historyPesanan($id){
		$transaksi = OrderObat::join('users','order_obats.id_user','=','users.id')
							  ->where([
							  			['id_apotek', $id],
							  			['status', 'selesai'] //menamplikan transaksi dengan status yg telah dibayar
									  ])
							  ->select('order_obats.id as id_order', 'total', 'users.name', 'status', 'order_obats.created_at as created_at')
							  ->get();

		return $transaksi;
	}
}
