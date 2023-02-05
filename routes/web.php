<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HomeController;
use App\Models\Autor;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('api/frase', [CitaController::class, 'index']);
Route::post('api/frase', [CitaController::class, 'store']);
Route::get('api/frase/{id}', [CitaController::class, 'show']);
Route::put('api/frase/{id}', [CitaController::class, 'update']);
Route::delete('api/frase/{id}', [CitaController::class, 'destroy']);

Route::get('api/author', [AutorController::class, 'index']);
Route::post('api/author', [AutorController::class, 'store']);
Route::get('api/author/{id}', [AutorController::class, 'show']);
Route::put('api/author/{id}', [AutorController::class, 'update']);
Route::delete('api/author/{id}', [AutorController::class, 'destroy']);
