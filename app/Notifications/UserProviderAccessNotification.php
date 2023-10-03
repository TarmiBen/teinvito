<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProvider;


class UserProviderAccessNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $user = Auth::user();
        //obtener el id del ultimo registro de la tabla userProvider hecho por el usuario autenticado
        $userProvider = UserProvider::where('users_id', $user->id)->latest()->first();
        $url = route('admin.userProviders.show', ['userProvider' => $userProvider->id]);
        $indexurl = route('admin.userProviders.index');
        return (new MailMessage)
            ->line('El usuario ' . Auth::user()->name . ' ' . 'ha asignado oto usuario a la compañia ')
            ->action('Ver registros', $indexurl)
            ->line('Gracias por usar nuestra aplicación.')
            ->line('Si, usted acepto la asignación de usuario a la compañia ignorar este mensaje');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
