<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Events\UserRegistered as BroadcastUserRegistered;

class NotifyAdminOfNewRegistration
{
    /**
     * Handle the native Laravel registration event.
     */
    public function handle(Registered $event): void
    {
        // $event->user is the user who just registered
        // We pass them to our real-time broadcasting event
        broadcast(new BroadcastUserRegistered($event->user));
    }
}
