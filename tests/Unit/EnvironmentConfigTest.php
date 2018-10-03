<?php

namespace Wearesho\Pvbki\Tests\Unit;

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

    public function testSuccessGetKey(): void
    {
        putenv('PVBKI_KEY=' . static::KEY);
        parent::testSuccessGetKey();
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
     * @expectedExceptionMessage Missing environment key PVBKI_KEY
     */
    public function testFailGetKey(): void
    {
        putenv('PVBKI_KEY');
        $this->fakeConfig->getKey();
    }
}
