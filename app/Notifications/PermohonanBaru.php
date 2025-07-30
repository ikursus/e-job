<?php

namespace App\Notifications;

use App\Models\Permohonan;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PermohonanBaru extends Notification implements ShouldQueue
{
    use Queueable;

    protected $permohonan;

    /**
     * Create a new notification instance.
     */
    public function __construct(Permohonan $permohonan)
    {
        $this->permohonan = $permohonan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Permohonan baru telah dihantar.')
            ->action('Lihat Permohonan', url('/permohonan/' . $this->permohonan->id))
            ->line('Terima kasih telah menggunakan aplikasi ini!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'nama_jawatan' => $this->permohonan->jawatan->title,
            'id_permohonan' => $this->permohonan->id,
            'nama_pemohon' => $this->permohonan->user->name,
        ];
    }
}
