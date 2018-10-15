<?php

namespace Wearesho\Pvbki\Tests\Unit;

use Wearesho\Pvbki\Config;
use Wearesho\Pvbki\Elements\Record;
use Wearesho\Pvbki\Tests\ConfigTestCase;

/**
 * Class ConfigTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass Config
 * @internal
 */
class ConfigTest extends ConfigTestCase
{
    protected function setUp(): void
    {
        $this->fakeConfig = new Config(
            static::USERNAME,
            static::PASSWORD,
            static::ACCESS_POINT,
            static::KEY,
            static::MODE,
            static::URL
        );
    }

    /**
     * @expectedException \Wearesho\Pvbki\Exceptions\InvalidModeException
     * @expectedExceptionMessageRegExp /^Configured invalid service mode: \d+$/
     */
    public function testInvalidMode(): void
    {
        new Config(
            static::USERNAME,
            static::PASSWORD,
            static::ACCESS_POINT,
            static::KEY,
            mt_rand(200, 300)
        );
    }
}
