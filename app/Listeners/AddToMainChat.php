<?php

namespace App\Listeners;

use App\Events\UserRegistred;
use App\Models\Chat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddToMainChat
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
     * @param  \App\Events\UserRegistred  $event
     * @return void
     */
    public function handle(UserRegistred $event)
    {
        Chat::find(1)->addMember($event->user);
    }
}
