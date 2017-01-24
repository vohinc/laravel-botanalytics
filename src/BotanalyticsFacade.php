<?php
namespace Casperlaitw\LaravelBotanalytics;

use Illuminate\Support\Facades\Facade;

/**
 * Class BotanalyticsFacade
 * @package Casperlaitw\LaravelBotanalytics
 */
class BotanalyticsFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'botanalytics.wrapper';
    }
}
