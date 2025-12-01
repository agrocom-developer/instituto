<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SectionCapacityNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'section_id' => $this->data['section_id'],
            'section_title' => $this->data['section_title'],
            'program_id' => $this->data['program_id'],
            'program_title' => $this->data['program_title'],
            'session_id' => $this->data['session_id'],
            'session_title' => $this->data['session_title'],
            'semester_id' => $this->data['semester_id'],
            'semester_title' => $this->data['semester_title'],
            'enrolled_count' => $this->data['enrolled_count'],
            'capacity' => $this->data['capacity'],
            'percentage' => $this->data['percentage'],
            'type' => $this->data['type']
        ];
    }
}

