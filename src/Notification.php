<?php

/**
 * Sendet an Kunden, wenn der Kunde erstellt wurde, bzw dessen Xml-Datei asugelesen wurde
 * Der Kunde erhäölt eine E-Mail mit einem Link, wo er seine Termine für die angefragte Immobilie buchen kann
 */

namespace Zoomyboy\BetterNotifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

abstract class ClientNotification extends Notification
{
    use Queueable;
	
	abstract public function subject();
	abstract public function greeting();

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

	public function message() {
        $message = new MailMessage;
		$message->subject($this->subject());
		$message->greeting($this->greeting());

		$message->markdown('vendor.notifications.custom');

		return $message;
	}

    abstract public function toMail($notifiable);

    public function toArray($notifiable)
    {
        return [];
    }
}
