<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserCreatedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    protected readonly User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: config('mail.admin.address'),
            subject: 'User Created Admin',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.user.created_admin',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
