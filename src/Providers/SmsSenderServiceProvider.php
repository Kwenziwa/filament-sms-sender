<?php

namespace Kwenziwa\FilamentSmsSender\Providers;

use Illuminate\Support\ServiceProvider;

class SmsSenderServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register the Vonage SMS service if needed
    }

    public function boot()
    {
        // Load the configuration file
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-sms-sender.php', 'filament-sms-sender');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-sms-sender');
    }
}
