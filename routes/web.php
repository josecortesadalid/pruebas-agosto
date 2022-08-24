<?php

use App\Http\Controllers\MensajesController;
use App\Mail\TuMensajeFueRecibido;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/email', function () {

    $message = 'Esto es un mensaje';
    Mail::to('jose.cortes@adalid.net')->send(new TuMensajeFueRecibido($message));

    return view('prueba');
});

Route::resource('/mensajes', MensajesController::class);