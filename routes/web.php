<?php

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

Route::get('/',[App\Http\Controllers\UserDetailsController::class,'index'])->name('userDetail.index');
Route::get('/create',[App\Http\Controllers\UserDetailsController::class,'create'])->name('userDetail.create');
Route::get('/edit/{id}',[App\Http\Controllers\UserDetailsController::class,'edit'])->name('userDetail.edit');
Route::get('/remove/{id}',[App\Http\Controllers\UserDetailsController::class,'remove'])->name('userDetail.remove');
Route::post('/store',[App\Http\Controllers\UserDetailsController::class,'store'])->name('userDetail.store');
Route::post('/update',[App\Http\Controllers\UserDetailsController::class,'store'])->name('userDetail.update');
