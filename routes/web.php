<?php

use App\Exports\UsersExport;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PostsController;
use App\Mail\TuMensajeFueRecibido;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redis;

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

// Route::get('/descargaexcel', function () {
//     return Excel::download(new UsersExport, 'users.xlsx');
// });

// Route::get('/excel', function () {
//     Excel::store(new User(), 'users.xlsx', 'public'); 
//     return 'Listo';
// });

// Route::get('/excel', function ()
// {
//     return (new UsersExport(2022))->download('users.xlsx');
// });

// Route::get('/de', function ()
// {
//     return (new UsersExport())->download('users.xlsx');
// });

Route::get('/de', function ()
{
    (new UsersExport)->store('users.csv');
    return 'Exportando...';
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