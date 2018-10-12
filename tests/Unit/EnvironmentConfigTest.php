<?php

namespace Wearesho\Pvbki\Tests\Unit;

use Wearesho\Pvbki\ConfigInterface;
use Wearesho\Pvbki\EnvironmentConfig;
use Wearesho\Pvbki\Tests\ConfigTestCase;

/**
 * Class EnvironmentConfigTest
 * @package Wearesho\Pvbki\Tests\Unit
 * @coversDefaultClass EnvironmentConfig
 * @internal
 */
class EnvironmentConfigTest extends ConfigTestCase
{
    protected function setUp(): void
    {
        $this->fakeConfig = new EnvironmentConfig();
    }

    public function testSuccessGetUsername(): void
    {
        putenv('PVBKI_USERNAME=' . static::USERNAME);
        parent::testSuccessGetUsername();
    }

    public function testSuccessGetPassword(): void
    {
        putenv('PVBKI_PASSWORD=' . static::PASSWORD);
        parent::testSuccessGetPassword();
    }

    public function testSuccessGetAccessPoint(): void
    {
        putenv('PVBKI_ACCESS_POINT=' . static::ACCESS_POINT);
        parent::testSuccessGetAccessPoint();
    }

    public function testSuccessGetKey(): void
    {
        putenv('PVBKI_KEY=' . static::KEY);
        parent::testSuccessGetKey();
    }

    public function testSuccessGetMode(): void
    {
        putenv('PVBKI_MODE=' . static::MODE);
        parent::testSuccessGetMode();
    }

    public function testSuccessGetUrl(): void
    {
        putenv('PVBKI_URL=' . static::URL);
        parent::testSuccessGetUrl();
    }

    /**
     * @expectedException \Horat1us\Environment\MissingEnvironmentException
     * @expectedExceptionMessage Missing environment key PVBKI_USERNAME
     */
    public function testFailGetUsername(): void
    {
        putenv('PVBKI_USERNAME');
        $this->fakeConfig->getUsername();
    }

    /**
     * @expectedException \Horat1us\Environment\MissingEnvironmentException
     * @expectedExceptionMessage Missing environment key PVBKI_PASSWORD
     */
    public function testFailGetPassword(): void
    {
        putenv('PVBKI_PASSWORD');
        $this->fakeConfig->getPassword();
    }

    /**
     * @expectedException \Horat1us\Environment\MissingEnvironmentException
     * @expectedExceptionMessage Missing environment key PVBKI_ACCESS_POINT
     */
    public function testFailGetAccessPoint(): void
    {
        putenv('PVBKI_ACCESS_POINT');
        $this->fakeConfig->getAccessPoint();
    }

    /**
     * @expectedException \Horat1us\Environment\MissingEnvironmentException
     * @expectedExceptionMessage Missing environment key PVBKI_KEY
     */
    public function testFailGetKey(): void
    {
        putenv('PVBKI_KEY');
        $this->fakeConfig->getKey();
    }

    public function testDefaultMode(): void
    {
        putenv('PVBKI_MODE');
        $this->assertEquals(
            ConfigInterface::PRODUCTION_MODE,
            $this->fakeConfig->getMode()
        );
    }

    /**
     * @expectedException \Wearesho\Pvbki\Exceptions\InvalidModeException
     * @expectedExceptionMessageRegExp /^Configured invalid service mode: \d+$/
     */
    public function testInvalidMode(): void
    {
        putenv('PVBKI_MODE=' . mt_rand(200, 300));
        putenv('PVBKI_URL');
        $this->fakeConfig->getUrl();
    }

    public function testGetTestUrl(): void
    {
        putenv('PVBKI_MODE=' . ConfigInterface::TEST_MODE);
        $this->assertEquals(
            ConfigInterface::TEST_URL,
            $this->fakeConfig->getUrl()
        );
    }

    public function testDefaultUrl(): void
    {
        putenv('PVBKI_URL');
        putenv('PVBKI_MODE');
        $this->assertEquals(
            ConfigInterface::PRODUCTION_URL,
            $this->fakeConfig->getUrl()
        );
    }
}
