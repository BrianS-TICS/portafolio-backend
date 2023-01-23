<?php

use App\Http\Controllers\CitaController;
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

Route::get('api/frase', [CitaController::class, 'index']);
Route::get('api/frase/{id}', [CitaController::class, 'show']);
Route::put('api/frase/{id}', [CitaController::class, 'update']);
Route::delete('api/frase/{id}', [CitaController::class, 'destroy']);
