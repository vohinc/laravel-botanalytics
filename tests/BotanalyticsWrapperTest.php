<?php
namespace Casperlaitw\LaravelBotanalytics\Tests;

use Casperlaitw\BotanalyticsPhp\Exceptions\MissDriverException;
use Casperlaitw\LaravelBotanalytics\BotanalyticsWrapper;
use PHPUnit\Framework\TestCase;

class BotanalyticsWrapperTest extends TestCase
{
    /** @test */
    public function not_support_driver()
    {
        // Arrange
        $wrapper = new BotanalyticsWrapper();
        // Act
        try {
            $wrapper->noSupportDriver();
        } catch (MissDriverException $ex) {
            return;
        }
        // Assert
        $this->fail('Create non-support driver success even driver no the driver ');
    }
}
