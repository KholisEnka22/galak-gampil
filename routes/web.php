<?php

use App\Http\Controllers\BabController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KitabController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard',[DashboardController::class,'index']);

Route::get('/kitab',[KitabController::class,'index'])->name('kitab');
Route::post('/store/kitab',[KitabController::class,'store'])->name('store.kitab');
Route::post('/update/kitab/{id}',[KitabController::class,'update'])->name('update.kitab');
Route::get('/detail_kitab/{id}/{slug}',[KitabController::class,'show'])->name('detail.kitab');
Route::get('/hapus/kitab/{id}',[KitabController::class,'destroy'])->name('hapus.kitab');

Route::post('/store/bab',[BabController::class,'store'])->name('store.bab');

Route::get('/bab',[BabController::class,'index'])->name('bab');
Route::get('/bab/{id}',[BabController::class,'show'])->name('dtl.bab');
// Route::get('/bab/{slug}/{id}',[BabController::class,'index'])->name('bab.index');
