<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Mail\UserCreatedAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendUserCreationAdminNotification implements ShouldQueue
{
    public int $tries = 3;

    public function handle(UserCreated $event): void
    {
        Mail::sendNow(new UserCreatedAdmin($event->user));
    }
}
