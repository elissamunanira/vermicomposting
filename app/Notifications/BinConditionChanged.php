<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BinConditionChanged extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $conditions;
    protected $old_conditions;
    protected $bin;
    protected $acceptable_temperatures;
    protected $acceptable_humidity;
    protected $acceptable_acidity;

    public function __construct($conditions, $old_conditions, $bin)
    {
        $this->conditions = $conditions;
        $this->old_conditions = $old_conditions;
        $this->bin = $bin;
        // $this->acceptable_temperatures = $acceptable_temperatures;
        // $this->acceptable_humidity = $acceptable_humidity;
        // $this->acceptable_acidity = $acceptable_acidity;
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
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            "temperature" => $this->conditions->temperature,
            "humidity" => $this->conditions->humidity,
            "acidity" => $this->conditions->acidity,
            "pre_temperature" => $this->old_conditions['temperature'],
            "pre_humidity" => $this->old_conditions['humidity'],
            "pre_acidity" => $this->old_conditions['acidity'],
            "bin_number" => $this->old_conditions['bin_number'],
            // "acceptable_temperatures" => $this->acceptable_temperatures,
            // "acceptable_humidity" => $this->acceptable_humidity,
            // "acceptable_acidity" => $this->acceptable_acidity,
        ];
    }

}
