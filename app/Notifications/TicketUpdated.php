<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketUpdated extends Notification
{
    use Queueable;

    protected $ticket;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    public function via($notifiable)
    {
        return ['mail']; // يمكنك إضافة قنوات أخرى مثل 'database' أو 'broadcast'
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('تحديث تذكرة الدعم')
            ->line('تم تحديث تذكرة الدعم الخاصة بك.')
            ->action('عرض التذكرة', url('/admin/tickets/' . $this->ticket->id))
            ->line('شكرًا لك على استخدام نظام الدعم لدينا!');
    }
}
