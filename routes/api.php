<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
	APOTEK API START HERE
	{id}	= id apotek
*/

Route::get('apotek/{id}', 'Apotek\ApotekController@getProfil'); //menampilkan profil dari apotek
Route::post('apotek/{id}/update', 'Apotek\ApotekController@updateProfil'); //update profil apotek
Route::get('apotek/{id}/delete', 'Apotek\ApotekController@deleteProfil'); //delete profil apotek

Route::post('apotek/{id}/add_medicine', 'Apotek\ApotekController@addObat'); //menambahkan data obat
Route::get('apotek/{id}/medicine', 'Apotek\ApotekController@getObat'); //menampilkan data obat
Route::post('apotek/{id}/update_medicine', 'Apotek\ApotekController@updateObat'); //update data obat

Route::post('apotek/{id}/add_nama_obat', 'Apotek\ApotekController@addNamaObat'); //menambahkan nama obat jika nama obat tidak tersedia
Route::get('apotek/{id}/list_nama_obat', 'Apotek\ApotekController@getNamaObat'); //menampilkan nama obat yang akan diinput

Route::post('apotek/{id}/add_jenis_obat', 'Apotek\ApotekController@addJenisObat'); //menambahkan jenis obat
Route::get('apotek/{id}/jenis_obat', 'Apotek\ApotekController@getJenisObat'); //menampilkan jenis obat

Route::get('apotek/{id}/pesanan', 'Apotek\PesananController@getPesanan'); //get list pesanan
Route::get('apotek/{id_apotek}/pesanan/{id_order}', 'Apotek\PesananController@detailPesanan'); //get detail pesanan
Route::get('apotek/{id_apotek}/pesanan/{id_order}/terima', 'Apotek\PesananController@terimaPesanan'); //terima pesanan
Route::get('apotek/{id_apotek}/pesanan/{id_order}/tolak', 'Apotek\PesananController@tolakPesanan'); //tolak pesanan

Route::get('apotek/{id}/proses', 'Apotek\PesananController@getPesananProses'); //get pesanan yg telah diproses
Route::get('apotek/{id_apotek}/proses/{id_order}/ojek', 'Apotek\PesananController@prosesPesananSelesai'); //pesanan selesai diproses
Route::get('apotek/{id}/historyPesanan', 'Apotek\PesananController@historyPesanan'); //history pesanan


Route::post('apotek/register','Apotek\AuthController@register');
Route::post('apotek/login','Apotek\AuthController@login');

/*
	APOTEK API END HERE
**/

Route::post('dokter/register', 'DokterController@register');
Route::post('dokter/login', 'DokterController@login');

Route::post('dokter/logout','DokterController@logout');
Route::post('dokter/{id}/edit', 'DokterController@editProfil');

Route::get('dokter/{id}/konsultasi', 'DokterController@getKonsultasi'); //get list pesanan
Route::post('dokter/{id}/konsultasi/{id_dokter}/terima', 'DokterController@terimaKonsultasi');

/** 
	ROUTING LABORATORIUM
*/


Route::group(['prefix' => 'lab'], function () {

	Route::post('/login','Lab\LabAuthController@login');
	Route::post('/register','Lab\LabAuthController@register');
	// Route::post('/logout','Lab\LabController@logout');

	Route::get('/daftar-cek-lab','Lab\LabController@showListCekLab' );
	Route::post('/input-cek-lab','Lab\LabController@inputCekLab');
	Route::post('/edit-cek-lab/{id}','Lab\LabController@editCekLab');


});






/** 
	ROUTING LABORATORIUM END HERE
*/



/*
|
| Kurir
|
*/

Route::get('kurir/{id}','KurirController@getProfil');
Route::post('kurir/{id}/update','KurirController@updateProfil');
Route::post('kurir/login','KurirController@login');
Route::post('kurir/register','KurirController@register');
