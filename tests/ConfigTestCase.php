<?php

namespace Wearesho\Pvbki\Tests;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\ConfigInterface;

/**
 * Class ConfigTestCase
 * @package Wearesho\Pvbki\Tests
 */
class ConfigTestCase extends TestCase
{
    protected const USERNAME = 'username';
    protected const PASSWORD = 'password';
    protected const KEY = 'key';

    /** @var ConfigInterface */
    protected $fakeConfig;

    public function testSuccessGetUsername(): void
    {
        $this->assertEquals(
            static::USERNAME,
            $this->fakeConfig->getUsername()
        );
    }

    public function testSuccessGetPassword(): void
    {
        $this->assertEquals(
            static::PASSWORD,
            $this->fakeConfig->getPassword()
        );
    }

    public function testSuccessGetKey(): void
    {
        $this->assertEquals(
            static::KEY,
            $this->fakeConfig->getKey()
        );
    }
}
