<?php

namespace Wearesho\Pvbki\Tests\Unit;

use Wearesho\Pvbki;

/**
 * Class ConfigTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass \Wearesho\Pvbki\Config
 * @internal
 */
class ConfigTest extends Pvbki\Tests\Extend\ConfigTestCase
{
    protected function setUp(): void
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->config = new Pvbki\Config(
            static::USERNAME,
            static::PASSWORD,
            static::ACCESS_POINT,
            static::KEY,
            static::MODE,
            static::URL
        );
    }

    /**
     * @expectedException \Wearesho\Pvbki\Exceptions\UnsupportedMode
     * @expectedExceptionMessageRegExp /^Configured unsupported service mode: \d+$/
     */
    public function testInvalidMode(): void
    {
        new Pvbki\Config(
            static::USERNAME,
            static::PASSWORD,
            static::ACCESS_POINT,
            static::KEY,
            mt_rand(200, 300)
        );
    }
}
