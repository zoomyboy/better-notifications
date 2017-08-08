<?php

namespace Zoomyboy\BetterNotifications;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {
	public function boot() {
		$this->loadViewsFrom(__DIR__.'/resources/views', 'BetterNotifications');

		$this->publishes([
			__DIR__.'/resources' => resource_path('views/vendor/BetterNotifications'),
		], 'better-notifications');
	}

	public function register() {
		
	}
}
