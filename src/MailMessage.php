<?php

namespace Zoomyboy\BetterNotifications;

use Illuminate\Notifications\Messages\MailMessage as BaseMailMessage;

class MailMessage extends BaseMailMessage {

	public $subbuttons = [];
	public $elements = [];
	public $subcopy = '';
	public $level = 'success';
	public $user;

	public function __construct($user = null) {
		$this->user = $user;

		$this->markdown('BetterNotifications::custom')
			->greeting($this->greet());
	}

	public function greet() {
		return __('mail.greeting', ['name' => $this->getUser()]);
	}

	private function getUser() {
		if (!$this->user) {
			return '';
		}

		if ($this->user->name) {
			return $this->user->name;
		}
		if ($this->user->firstname && $this->user->lastname) {
			return $this->user->firstname.' '.$this->user->lastname;
		}

		return '';
	}

    /**
     * Get an array representation of the message.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'level' => $this->level,
            'subject' => $this->subject,
            'greeting' => $this->greeting,
            'salutation' => $this->salutation,
			'elements' => $this->elements,
			'subcopy' => $this->subcopy
        ];
	}

	public function btnSuccess($url, $action) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'green', 'action' => $action];
		return $this;
	}

	public function btnWarning($url, $action) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'yellow', 'action' => $action];
		return $this;
	}

	public function btnPrimary($url, $action) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'red', 'action' => $action];
		return $this;
	}

	public function btnDanger($url, $action) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'red', 'action' => $action];
		return $this;
	}

	public function buttonline($callable) {
		$buttons = [];
		$line = new Line();
		call_user_func_array($callable, array(&$line));
		$this->elements[] = ['type' => 'row', 'elements' => $line->elements];

		return $this;
	}

	public function line($text) {
		$this->elements[] = ['type' => 'line', 'content' => $text];
		return $this;
	}

	public function action($url, $text) {
		$this->elements[] = ['type' => 'action', 'url' => $url, 'content' => $text, 'color' => 'primary'];
		return $this;
	}

	public function subcopy($subcopy) {
		$this->subcopy = $subcopy;
		return $this;
	}

	public function salutation($salutation) {
		$this->salutation = $salutation;

		return $this;
	}

	public function error() {
		$this->level = 'danger';

		return $this;
	}

	public function success() {
		$this->level = 'success';

		return $this;
	}

	public function warning() {
		$this->level = 'warning';

		return $this;
	}
}
