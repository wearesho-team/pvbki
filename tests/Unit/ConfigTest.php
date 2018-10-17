<?php

namespace Wearesho\Pvbki\Tests\Unit;

use Wearesho\Pvbki\Config;
use Wearesho\Pvbki\Tests\Extend\ConfigTestCase;

/**
 * Class ConfigTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass \Wearesho\Pvbki\Config
 * @internal
 */
class ConfigTest extends ConfigTestCase
{
    protected function setUp(): void
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->config = new Config(
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
     * @expectedExceptionMessageRegExp /^Configured unsupported service mode: \d+$/
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
