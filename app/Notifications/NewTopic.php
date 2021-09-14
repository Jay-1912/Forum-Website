<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class NewTopic extends Notification
{
    use Queueable;

    public $topic;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($topic)
    {
        $this->topic = $topic;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $user = User::find($this->topic->user_id);
        return [
            //
            'name'=>$user->name,
            'email'=>$user->email,
            'message'=>"New Topic created : ".$this->topic->title,
            'type'=>3
        ];
    }
}
