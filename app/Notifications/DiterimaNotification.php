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
    // public $isbn;
    private $pengusulan;
    private $user;
    public function __construct($pengusulan, $user)
    {
        //
        $this->pengusulan = $pengusulan;
        $this->user = $user;
        // $this->pengusulan = $pengusulan->isbn;
        // $this->pengusulan = $pengusulan->user;
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
            'name' => is_object($this->user) ? $this->user->name : 'Nama tidak tersedia',
            'username' => is_object($this->user) ? $this->user->username : 'username tidak tersedia',
            'bookTitle' => is_object($this->pengusulan) ? $this->pengusulan->bookTitle : 'Isbn tidak tersedia',
            'isbn' => is_object($this->pengusulan) ? $this->pengusulan->isbn : 'Isbn tidak tersedia',
            // 'isbn' =>$this->pengusulan->isbn ?? 'Isbn tidak tersedia',
            'status' => 'diproses',
            'message' => 'Usulan sedang kami proses, mohon untuk menunggu. Terimakasih sudah melakukan pengusulan',
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
            'user_id' => $this->pengusulan->user_id,
            'id' => $this->pengusulan->id,
            'name' => $this->pengusulan->name,
            'email' => $this->pengusulan->email,
            'genre' => $this->pengusulan->genre,
            'publicationYear' => $this->pengusulan->publicationYear,
            'publisher' => $this->pengusulan->publisher,
            'isbn' => $this->pengusulan->isbn,
            'bookTitle' => $this->pengusulan->bookTitle,
            'author' => $this->pengusulan->author,
            'messages' => $this->pengusulan->name. 'Pengusulan dengan'. $this->pengusulan->isbn. 'sedang kami proses, mohon untuk menunggu. terimakasih sudah melakukan pengusulan',
            'status' => 'diproses',

            
            
        ];
    }
}
