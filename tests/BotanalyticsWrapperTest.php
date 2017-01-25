<?php
namespace Vohinc\LaravelBotanalytics\Tests;

use Vohinc\BotanalyticsPhp\Exceptions\MissDriverException;
use Vohinc\LaravelBotanalytics\BotanalyticsWrapper;
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
