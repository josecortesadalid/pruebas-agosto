<?php

namespace App\Providers;

use App\Models\User;
use App\Notifications\PostPublished;
use App\Providers\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class NotifyUsersAboutNewPost
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $users = User::all();
        var_dump($event->post);
        // FacadesNotification::send($users, new PostPublished($event->post));
    }
}
