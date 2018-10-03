<?php

namespace Wearesho\Pvbki\Tests\Unit;

use Wearesho\Pvbki\Config;
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
        $this->fakeConfig = new Config(static::USERNAME, static::PASSWORD, static::KEY);
    }
}
