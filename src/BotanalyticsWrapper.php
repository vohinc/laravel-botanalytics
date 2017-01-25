<?php
namespace Vohinc\LaravelBotanalytics;

use Vohinc\BotanalyticsPhp\Client;
use Vohinc\BotanalyticsPhp\Exceptions\MissDriverException;

/**
 * Class BotanalyticsWrapper
 * @package Vohinc\LaravelBotanalytics
 */
class BotanalyticsWrapper
{
    /**
     * BotanalyticsWrapper constructor.
     */
    public function __construct()
    {
        $this->client = new Client(config('botanalytics.token'));
    }

    /**
     * @param $name
     * @param $arguments
     * @return Client
     * @throws \Vohinc\BotanalyticsPhp\Exceptions\MissDriverException
     */
    public function __call($name, $arguments)
    {
        $name = studly_case($name);
        $driver = "\\Vohinc\\BotanalyticsPhp\\Drivers\\{$name}";
        if (class_exists($driver)) {
            $this->client->setDriver(new $driver);
            return $this->client;
        }

        throw new MissDriverException;
    }
}
