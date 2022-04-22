<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudyController;

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
Route::get('/where', [App\Http\Controllers\HomeController::class, 'where'])->name('where');
Route::get('/progress', [App\Http\Controllers\HomeController::class, 'progress'])->name('progress');
Route::get('/due', [App\Http\Controllers\HomeController::class, 'due'])->name('due');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('/consent/list', [App\Http\Controllers\ConsentController::class, 'list'])->name('consentforms.pips.list');
Route::get('/consent/{consentform}', [App\Http\Controllers\ConsentController::class, 'edit'])->name('consentforms.pips.edit');
Route::delete('/consent/PIPS/{consentform}', [App\Http\Controllers\ConsentController::class, 'destroy'])->name('consentforms.destroy');
Route::patch('/consent/PIPS/{consentform}', [App\Http\Controllers\ConsentController::class, 'update'])->name('consentforms.update');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('study', StudyController::class);
});
