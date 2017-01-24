<?php
/**
 * Created by PhpStorm.
 * User: casperlai
 * Date: 2017/1/24
 * Time: 下午7:52
 */

namespace Casperlaitw\LaravelBotanalytics;

use Casperlaitw\BotanalyticsPhp\Client;
use Casperlaitw\BotanalyticsPhp\Exceptions\MissDriverException;

/**
 * Class BotanalyticsWrapper
 * @package Casperlaitw\LaravelBotanalytics
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
     * @throws \Casperlaitw\BotanalyticsPhp\Exceptions\MissDriverException
     */
    public function __call($name, $arguments)
    {
        $name = studly_case($name);
        $driver = "\\Casperlaitw\\BotanalyticsPhp\\Drivers\\{$name}";
        if (class_exists($driver)) {
            $this->client->setDriver(new $driver);
            return $this->client;
        }

        throw new MissDriverException;
    }
}
