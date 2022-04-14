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
Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
Route::get('/consent/PIPS', [App\Http\Controllers\ConsentController::class, 'pips'])->name('consentforms.pips');
Route::post('/consent/PIPS/store', [App\Http\Controllers\ConsentController::class, 'store'])->name('consentforms.pips.store');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
