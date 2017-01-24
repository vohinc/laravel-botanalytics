<?php
/**
 * Created by PhpStorm.
 * User: casperlai
 * Date: 2017/1/24
 * Time: 下午7:49
 */

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
