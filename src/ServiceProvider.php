<?php

namespace Zoomyboy\BetterNotifications;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {
    public function boot() {
        $this->loadViewsFrom(__DIR__.'/resources', 'BetterNotifications');

        $this->publishes([
            __DIR__.'/resources' => resource_path('views/vendor/BetterNotifications'),
            __DIR__.'/config.php' => config_path('better-notifications.php')
        ], 'better-notifications');

        $this->mergeConfigFrom(
            __DIR__.'/config.php', 'better-notifications'
        );
    }

    public function register() {
        
    }
}
