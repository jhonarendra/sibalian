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

/*
	APOTEK API END HERE
**/