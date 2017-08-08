<?php

namespace Zoomyboy\BetterNotifications;

class Line {

	public $elements = [];

	public function btnSuccess($action, $url) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'green', 'action' => $action];
		return $this;
	}

	public function btnWarning($action, $url) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'yellow', 'action' => $action];
		return $this;
	}

	public function btnDanger($action, $url) {
		$this->elements[] = ['type' => 'button', 'url' => $url, 'color' => 'red', 'action' => $action];
		return $this;
	}
}
