<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;
        return view('notifications.index', [
            'unreadNotifications' => auth()->user()->unreadNotifications, // para los que tienen el campo read nulo
            'readNotifications' => auth()->user()->readNotifications, // para los que tienen el campo read no nulo
            // tendremos estas 2 variables disponibles en la vista
        ]);
    }
    public function read($id)
    {
        DatabaseNotification::find($id)->markAsRead();
        return back()->with('flash', 'Notificación marcada como leída');
    }
    public function destroy($id)
    {
        DatabaseNotification::find($id)->delete();
        return back()->with('flash', 'Notificación marcada como leída');
    }
}
