<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\User;
use App\Notifications\MessageSent;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class MensajesController extends Controller
{
    use Notifiable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajes = Mensaje::all();
        return view('mensajes.lista', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('mensajes.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'imagen' => 'required',
            'recipient_id' => 'required|exists:users,id' // el recipient_id es obligatorio y nos aseguramos de que existe en la tabla users, campo id
        ]);

        $message = Mensaje::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
            'imagen' => $request->imagen
        ]);

        // $request->file('imagen')->store('public');
        // $mensaje = new Mensaje($request->all());
        // $mensaje->imagen = $request->file('imagen')->store('public');;
        // $mensaje->save();

        $recipient = User::find($request->recipient_id);

        $recipient->notify(new MessageSent($message));
       
        return 'Mensaje creado';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
