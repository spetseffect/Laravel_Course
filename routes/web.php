<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', [App\Http\Controllers\MainController::class, 'index']);

Auth::routes();

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');
Route::get('/test/create', [App\Http\Controllers\MainController::class, 'create'])->name('main.create');
Route::post('/test/store', [App\Http\Controllers\MainController::class, 'store'])->name('main.store');
Route::post('/test/addimg', [App\Http\Controllers\MainController::class, 'addImg'])->name('main.addImg');
