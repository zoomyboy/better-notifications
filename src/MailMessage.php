<?php

namespace Zoomyboy\BetterNotifications;

use Illuminate\Notifications\Messages\MailMessage as BaseMailMessage;

class MailMessage extends BaseMailMessage {

	public $subbuttons = [];
	public $elements = [];
	public $subcopy = '';
	public $level = 'success';
	public $user;
	public $heading = false;

	public function __construct($user = null) {
		$this->user = $user;

		$this->heading = config('app.name');

		$this->markdown('BetterNotifications::views.custom')
			->greeting($this->greet());
	}

	public function greet() {
		return __('mail.greeting', ['name' => $this->getUser()]);
	}

	public function heading($heading) {
		$this->heading = $heading;

		return $this;
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
			'subcopy' => $this->subcopy,
			'heading' => $this->heading
        ];
	}

	public function btnSuccess($url, $content) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'green', 'content' => $content, 'class' => 'row md-3'];
		return $this;
	}

	public function btnWarning($url, $content) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'yellow', 'content' => $content, 'class' => 'row md-3'];
		return $this;
	}

	public function btnPrimary($url, $content) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'red', 'content' => $content, 'class' => 'row md-3'];
		return $this;
	}

	public function btnDanger($url, $content) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'red', 'content' => $content, 'class' => 'row md-3'];
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
		$this->elements[] = ['type' => 'line', 'content' => $text, 'class' => 'no-paragraph'];
		return $this;
	}

	public function paragraph($text) {
        $this->elements[] = ['type' => 'line', 'content' => $text, 'class' => 'paragraph'];
		return $this;
	}

	public function action($url, $text) {
		$this->elements[] = ['type' => 'action', 'url' => $url, 'content' => $text, 'color' => 'primary', 'class' => 'row md-3'];
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

	public function info() {
		$this->level = 'info';

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
