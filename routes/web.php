<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () { return view('principal'); });
Route::get('/quienessomos', function () { return view('quienessomos'); });
Route::get('/comercializacion', function () { return view('comercializacion'); });
Route::get('/contacto', function () { return view('contacto'); });
Route::get('/terminos', function () { return view('terminos'); });

