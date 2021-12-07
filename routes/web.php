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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('myguest')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('loggedin')->group(function () {
    // Route::get('pembayaran', 'pembayaranController@index');
    // Route::post('pembayaran/pembayaran', 'pembayaranController@store');
    Route::get('pembayaran', [PembayaranController::class, 'semua']);
    Route::get('pembayaran/baru', [PembayaranController::class, 'index']);
    Route::get('pembayaran/success', [PembayaranController::class, 'success']);
    Route::post('pembayaran', [PembayaranController::class, 'store']);
    Route::post('pembayaran/hapus', [PembayaranController::class, 'hapus']);

    // Route::get('pembayaran/pembayaran', 'PembayaranController@create');
    // Route::get('pembayaran/view', 'PembayaranController@store');
    // Route::get('pembayaran/{id}/verifikasi', 'pembayaranController@verifikasi');

    Route::get('pendaftaran', [PendaftaranController::class, 'index']);
    Route::get('pendaftaran/bayar-dulu', [PendaftaranController::class, 'bayar_dulu']);
    // Route::get('pendaftaran/create', 'pendaftaranController@create');
    // Route::get('pendaftaran/baru', [PendaftaranController::class, 'create']);
    Route::get('pendaftaran/baru', [PendaftaranController::class, 'pilih_bayar']);
    Route::get('pendaftaran/bayar-tidak-valid', [PendaftaranController::class, 'bayar_tidak_valid']);

    Route::get('pendaftaran/data-pribadi', [PendaftaranController::class, 'data_pribadi']);
    Route::post('pendaftaran/data-pribadi', [PendaftaranController::class, 'save_data_pribadi']);
    
    Route::get('pendaftaran/data-ayah', [PendaftaranController::class, 'data_ayah']);
    Route::post('pendaftaran/data-ayah', [PendaftaranController::class, 'save_data_ayah']);
    
    Route::get('pendaftaran/data-ibu', [PendaftaranController::class, 'data_ibu']);
    Route::post('pendaftaran/data-ibu', [PendaftaranController::class, 'save_data_ibu']);
    
    Route::get('pendaftaran/data-wali', [PendaftaranController::class, 'data_wali']);
    Route::post('pendaftaran/data-wali', [PendaftaranController::class, 'save_data_wali']);

    Route::get('pendaftaran/data-periodik', [PendaftaranController::class, 'data_periodik']);
    Route::post('pendaftaran/data-periodik', [PendaftaranController::class, 'save_data_periodik']);

    Route::get('pendaftaran/data-registrasi', [PendaftaranController::class, 'data_registrasi']);
    Route::post('pendaftaran/data-registrasi', [PendaftaranController::class, 'save_data_registrasi']);

    Route::get('pendaftaran/data-keluar', [PendaftaranController::class, 'data_keluar']);
    Route::post('pendaftaran/data-keluar', [PendaftaranController::class, 'save_data_keluar']);
    
    Route::get('pendaftaran/data-selesai', [PendaftaranController::class, 'data_selesai']);

    // Route::post('pendaftaran/create', 'pendaftaranController@store');
    Route::get('pendaftaran/export', 'PendaftaranController@export');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/login', 'AuthController@login')->name('login');
// Route::post('/postlogin','AuthController@postlogin');
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'postlogin']);


// Route::get('/logout', 'AuthController@logout');

// Route::get('register/register', 'RegisterController@create');
Route::get('register/register', [RegisterController::class, 'create']);
// Route::post('register/register', 'RegisterController@store');
Route::post('register', [RegisterController::class, 'store']);
// Route::get('register', 'RegisterController@index');
Route::get('register', [RegisterController::class, 'index']);
Route::get('register-success', [RegisterController::class, 'success']);

// Route::get('pendaftaran','pendaftaranController@index');


Route::get('verifikasi/pendaftaran', 'verifikasiController@index');

//Route::get('dashboards/view', 'pendaftaranController@store');



// Route::get('pendaftaran/index', 'pendaftaranController@store');
// Route::get('pendaftaran', 'pendaftaranController@index');
// Route::get('pendaftaran/{id}/detail', 'pendaftaranController@detail');
// Route::get('pendaftaran/{id}/verifikasi', 'pendaftaranController@verifikasi');




Route::get('dasboards/viewdaftar', 'pendaftaranController@store');

// Route::group(['middleware' => 'auth'], function () {
// });

    //Route::post('/create','pendaftaranController@store');
    //Route::get('ppdb','Ppdb_controller@index');
    //Route::post('ppdb','Ppdb_controller@store');
