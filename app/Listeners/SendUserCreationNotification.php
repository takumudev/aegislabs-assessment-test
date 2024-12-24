<?php

namespace App\Listeners;

use App\Events\UserCreated as UserCreatedEvent;
use App\Mail\UserCreated as UserCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendUserCreationNotification implements ShouldQueue
{
    public int $tries = 3;

    public function handle(UserCreatedEvent $event): void
    {
        Mail::sendNow(new UserCreatedMail($event->user));
    }
}
