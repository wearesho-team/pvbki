<?php

namespace Wearesho\Pvbki\Tests\Extend;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Interrelations\ConfigInterface;

/**
 * Class ConfigTestCase
 * @package Wearesho\Pvbki\Tests\Extend
 * @internal
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
    protected $config;

    public function testSuccessGetUsername(): void
    {
        $this->assertEquals(static::USERNAME, $this->config->getUsername());
    }

    public function testSuccessGetPassword(): void
    {
        $this->assertEquals(static::PASSWORD, $this->config->getPassword());
    }

    public function testSuccessGetAccessPoint(): void
    {
        $this->assertEquals(static::ACCESS_POINT, $this->config->getAccessPoint());
    }

    public function testSuccessGetKey(): void
    {
        $this->assertEquals(static::KEY, $this->config->getKey());
    }

    public function testSuccessGetUrl(): void
    {
        $this->assertEquals(static::URL, $this->config->getUrl());
    }

    public function testSuccessGetMode(): void
    {
        $this->assertEquals(static::MODE, $this->config->getMode());
    }
}
