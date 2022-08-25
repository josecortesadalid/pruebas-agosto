<?php

use App\Http\Controllers\MensajesController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PostsController;
use App\Mail\TuMensajeFueRecibido;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    $pdf = Pdf::loadView('welcome');

    return $pdf->stream();
});

Route::get('/descarga', function () {
    $pdf = Pdf::loadView('welcome');

    return $pdf->download();
});

Route::get('/email', function () {

    $message = 'Esto es un mensaje';
    Mail::to('jose.cortes@adalid.net')->send(new TuMensajeFueRecibido($message));

    return view('prueba');
});

Route::resource('/mensajes', MensajesController::class);

Route::get('/notificaciones', [NotificationsController::class, 'index'])->name('notifications.index');

Route::patch('notificaciones/{id}', [NotificationsController::class, 'read'])->name('notifications.read');
Route::patch('notificaciones/{id}', [NotificationsController::class, 'destroy'])->name('notifications.destroy');

Route::resource('/posts', PostsController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';