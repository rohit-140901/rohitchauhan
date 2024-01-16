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

Route::get('/',[App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('/create',[App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::post('/store',[App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::get('/delete{id}',[App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy');
Route::get('/edit{id}',[App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::post('/update',[App\Http\Controllers\ProductController::class, 'update'])->name('update');
Route::get('/filter',[App\Http\Controllers\ProductController::class, 'filter'])->name('filter');
