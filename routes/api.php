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

Route::get('apotek/{id}', 'ApotekController@getProfil');
Route::post('apotek/{id}/update', 'ApotekController@updateProfil');
Route::get('apotek/{id}/delete', 'ApotekController@deleteProfil');

Route::post('apotek/{id}/add_medicine', 'ApotekController@addObat');
Route::get('apotek/{id}/medicine', 'ApotekController@getObat');

Route::get('apotek/{id}/list_medicine', 'ApotekController@getNamaObat');

Route::post('apotek/{id}/add_nama_obat', 'ApotekController@addNamaObat');
Route::post('apotek/{id}/add_jenis_obat', 'ApotekController@addJenisObat');
Route::get('apotek/{id}/jenis_obat', 'ApotekController@getJenisObat');


