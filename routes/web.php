<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;

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


});




