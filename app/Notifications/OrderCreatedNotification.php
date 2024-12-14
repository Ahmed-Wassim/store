<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        protected Order $order,
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     $address = $this->order->billingAddress;

    //     return (new MailMessage)
    //         ->subject("new Order #{$this->order->number}")
    //         ->line("new Order #{$this->order->number} created by {$address->name} from {$address->country_name}")
    //         ->action('View Order', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    public function toDatabase(object $notifiable)
    {

        $address = $this->order->billingAddress;
        return [
            'title' => "new Order #{$this->order->number}",
            'body' => "created by {$address->name} from {$address->country_name}",
            'order_id' => $this->order->id,
            'url' => 'dashboard/index',
            'icon' => 'fas fa-file'
        ];
    }

    public function toBroadcast($notifiable)
    {
        $address = $this->order->billingAddress;

        return new BroadcastMessage([
            'title' => "new Order #{$this->order->number}",
            'body' => "created by {$address->name} from {$address->country_name}",
            'order_id' => $this->order->id,
            'url' => 'dashboard/index',
            'icon' => 'fas fa-file'
        ]);
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