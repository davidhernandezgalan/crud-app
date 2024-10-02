<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ServicioController;

Route::get('/', function () {
return view('welcome');
});

//Route::resource('cita', CitaController::class)->parameters(['cita' => 'cita']);
Route::resource('servicio', ServicioController::class)->parameters(['servicio' => 'servicio']);
Route::resource('cita', CitaController::class)
    ->parameters(['cita' => 'cita']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


