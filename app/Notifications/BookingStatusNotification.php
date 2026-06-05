<?php

namespace App\Notifications;

use App\Models\CounselingSession;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public CounselingSession $session
    ) {}

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' =>
                $this->session->status === 'accepted'
                ? 'Sesi diterima 🎉'
                : 'Sesi ditolak ❌',

            'message' =>
                'Guru BK telah ' .
                ($this->session->status === 'accepted'
                    ? 'menerima'
                    : 'menolak') .
                ' sesi konselingmu.',
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => $this->toArray($notifiable)['title'],
            'message' => $this->toArray($notifiable)['message'],
        ]);
    }
}
