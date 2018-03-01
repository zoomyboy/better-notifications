# Installation

Add the ServiceProvider: 

```php
    // AppServiceProvider.php
    \Zoomyboy\BetterNotifications\ServiceProvider::class,
```

Change your Mail configuration to use the custom layouts:
```php
    // config/mail.php
    
    'markdown' => [
        'theme' => 'custom',

        'paths' => [
            base_path('vendor/zoomyboy/better-notifications/src/resources'),
        ],
    ],
```

## Publishing
If you want to override config and style of the E-Mails, you can publish the package files with:
```
php artisan vendor:publish --tag=better-notifications
```

This will create a config file '/config/better-notifications', where you can customize the package style easily. If you'd like to dig in deeper, you could also edit the template files located in '/resources/vendor/better-notifications'.

