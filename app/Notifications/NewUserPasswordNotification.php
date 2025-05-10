<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Arr;

class NewUserPasswordNotification extends Notification
{
    use Queueable;

    public function __construct(
        private readonly array $data
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Bem vindo ao ' . config('app.name'))
            ->line('O usuário administrador foi criado e a sua senha é:')
            ->line(Arr::get($this->data, 'password'));
    }
}
