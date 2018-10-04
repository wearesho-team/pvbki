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
    protected const ACCESS_POINT = 'access-point';
    protected const KEY = 'key';
    protected const URL = 'url';
    protected const MODE = 0;

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

    public function testSuccessGetAccessPoint(): void
    {
        $this->assertEquals(
            static::ACCESS_POINT,
            $this->fakeConfig->getAccessPoint()
        );
    }

    public function testSuccessGetKey(): void
    {
        $this->assertEquals(
            static::KEY,
            $this->fakeConfig->getKey()
        );
    }

    public function testSuccessGetUrl(): void
    {
        $this->assertEquals(
            static::URL,
            $this->fakeConfig->getUrl()
        );
    }

    public function testSuccessGetMode(): void
    {
        $this->assertEquals(
            static::MODE,
            $this->fakeConfig->getMode()
        );
    }
}
