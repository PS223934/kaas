<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\KaasController;

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

//main resource route
Route::resource('/', KaasController::class);

Route::get('/{kaas}', [KaasController::class, 'show']);
Route::get('/{kaas}/edit', [KaasController::class, 'edit']);

Route::put('/{kaas}', [KaasController::class, 'update']);

//custom endpoints because they're easy to use in js/ajax
Route::post('kaas-destroy',[KaasController::class,'destroy'])->name('kaas.destroy');
Route::post('kaas-undo', [KaasController::class, 'undo'])->name('kaas.undo');

