<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () { return view('principal'); });
Route::get('/quienessomos', function () { return view('quienessomos'); });
Route::get('/comercializacion', function () { return view('comercializacion'); });
Route::get('/contacto', function () { return view('contacto'); });
Route::get('/terminos', function () { return view('terminos'); });
Route::get('/consultas', function () { return view('consultas'); });
Route::get('/login', function () { return view('login'); });
Route::get('/registro', function () { return view('registro'); });


Route::get('/registro', [AuthController::class, 'showRegistro']);
Route::post('/registro', [AuthController::class, 'registro']);