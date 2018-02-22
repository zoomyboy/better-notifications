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
