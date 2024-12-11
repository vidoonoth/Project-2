<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DiterimaNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $isbn;
    public function __construct($isbn)
    {
        //
        $this->isbn = $isbn;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    // Simpan notifikasi dalam database
    public function toDatabase($notifiable)
    {
        return [
            'message' => "Usulan buku dengan isbn: '{$this->isbn}' diterima. ",
            'isbn' => $this->isbn,
            'status' => 'diterima',
        ];
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
