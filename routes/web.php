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

//admin routes
Route::group(['prefix' => 'admin'], function () {
// Login Routes...
    Route::get('login', ['as' => 'admin.login', 'uses' => 'AdminAuth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'admin.login.post', 'uses' => 'AdminAuth\LoginController@login']);
    Route::post('logout', ['as' => 'admin.logout', 'uses' => 'AdminAuth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'admin.register', 'uses' => 'AdminAuth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'admin.register.post', 'uses' => 'AdminAuth\RegisterController@register']);
});

Route::get('/admin', function () {
    return view('home');
})->name('admin')->middleware('auth:admin');

Route::get('/home', 'HomeController@index')->name('home');
