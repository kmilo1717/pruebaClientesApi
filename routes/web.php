<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;

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

Route::get('/', function () {
    return redirect()->route('home');
});

//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/apis', [HomeController::class, 'getapi'])->name('api');
Route::get('/client', [ClientController::class, 'crear'])->name('crear.cliente');
Route::get('/client/gestion/{id}', [ClientController::class, 'gestion'])->name('gestion.cliente');
Route::get('/client/eliminar/{id}', [ClientController::class, 'delete'])->name('eliminar.cliente');
Route::post('/client/actualizar', [ClientController::class, 'update'])->name('actualizar.cliente');
Route::post('/client/buscar', [ClientController::class, 'find'])->name('encontrar.cliente');
Route::post('/client/salvar', [ClientController::class, 'salvar'])->name('salvar.cliente');
