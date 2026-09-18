<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminResetPasswordNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected string $token
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $url = url(
            '/admin/redefinir-senha/' .
            $this->token .
            '?email=' .
            urlencode($notifiable->email)
        );

        return (new MailMessage)
            ->subject('Recuperação de senha - APPS')
            ->greeting('Olá!')
            ->line('Recebemos uma solicitação para redefinir sua senha de administrador.')
            ->action('REDEFINIR SENHA', $url)
            ->line('Este link é válido por 60 minutos.')
            ->line('Se você não solicitou a alteração da senha, ignore este e-mail.');
    }
}
