<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\KepalasekolahController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'auth' ], function(){

    Route::get('/', function (){return view('dashboard.index'); 
    });
    
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/postkategori', [KategoriController::class, 'store']);
    Route::post('/ubahkategori/{id}', [KategoriController::class, 'update']);
    Route::get('/hapuskategori/{id}', [KategoriController::class, 'hapus']);

    Route::get('/proker', [ProkerController::class, 'index']);
    Route::post('/postproker', [ProkerController::class, 'store']);
    Route::post('/ubahproker/{id}', [ProkerController::class, 'update']);
    Route::get('/hapusproker/{id}', [ProkerController::class, 'hapus']);

    Route::get('/kepalasekolah', [KepalasekolahController::class, 'index']);
    Route::post('/postkepalasekolah', [KepalasekolahController::class, 'store']);
    Route::post('/ubahkepalasekolah/{id}', [KepalasekolahController::class, 'update']);
    Route::get('/hapuskepalasekolah/{id}', [KepalasekolahController::class, 'hapus']);






});




