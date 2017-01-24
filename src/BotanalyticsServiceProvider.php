<?php
namespace Casperlaitw\LaravelBotanalytics;

use Illuminate\Support\ServiceProvider;

/**
 * Class BotanalyticsServiceProvider
 * @package Casperlaitw\LaravelBotanalytics
 */
class BotanalyticsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the service provider.
     */
    public function boot()
    {
        $configPath = __DIR__.'/../config/botanalytics.php';
        $this->publishes([$configPath => config_path('botanalytics.php')], 'config');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('botanalytics.wrapper', function () {
            return new BotanalyticsWrapper;
        });
    }
}
