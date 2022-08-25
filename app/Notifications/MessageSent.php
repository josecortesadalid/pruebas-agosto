<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSent extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Primera opción
        // return (new MailMessage)
                    // ->greeting($notifiable->name) // para poner el nombre del receptor
                    // ->subject('Mensaje recibido desde tu sitio web')
                    // ->line('Has recibido este mensaje') // recibe como parámetro el texto de una línea de contenido
                    // ->action('Clic aquí para ver el mensaje', route('mensajes.show', $this->message->id)) 
                    // // define un botón de llamada a la acción que recibe como primer parámetro el texto del botón y como segundo parámetro el link del botón
                    // ->line('Gracias por usar la aplicación');

        // Segunda opción
        return (new MailMessage)->view('emails.notification', [
            'msg' => $this->message,
            'user' => $notifiable
        ])->subject('Mensaje recibido desde la aplicación');

        // Tercera opción, la de usar mailables
        // return (new CustomMail($message))->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) // como solo usamos db, se nos ejecuta este método toArray
    {
        // return $this->message->toArray();
        return [
            'link' => route('mensajes.show', $this->message->id), 
            'text' => "has recibido un mensaje de ". User::find($this->message->sender_id)->name
        ];
    }
}
