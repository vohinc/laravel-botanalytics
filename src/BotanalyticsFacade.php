<?php
namespace Vohinc\LaravelBotanalytics;

use Illuminate\Support\Facades\Facade;

/**
 * Class BotanalyticsFacade
 * @package Vohinc\LaravelBotanalytics
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
