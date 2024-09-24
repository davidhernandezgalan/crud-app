<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;

Route::get('/', function () {
return view('welcome');
});

Route::resource('cita', CitaController::class)->parameters(['cita' => 'cita']);