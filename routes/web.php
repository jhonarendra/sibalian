<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*========================================================

Bayangan

/ => landing page

/user/login

/user/register

/user/{id_user} => profil user




/dokter => tampil dashboard dokter, riwayat chat, request chat

/dokter/login

/dokter/register

/dokter/{id_dokter} => profil dokter




/kurir => dashboard kurir

/kurir/login

/kurir/register

/kurir/{id_ojek} => profil



/apotek (sama juga login, register, profil)

/apotek/obat => CRUD obat



/admin juga sama






===========================================================*/




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dokter/filter', 'DokterController@index'); // si user mau nyari dokter, isi filter untuk nanti konsultasi 'filter' nanti ganti sama parameter harga dokter, jenis dokter


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
