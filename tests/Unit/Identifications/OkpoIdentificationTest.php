<?php

namespace Wearesho\Pvbki\Tests\Unit\Identifications;

use Wearesho\Pvbki\Identifications\OkpoIdentification;
use Wearesho\Pvbki\Tests\IdentificationTestCase;

/**
 * Class OkpoIdentificationTest
 * @package Wearesho\Pvbki\Tests\Unit\Identifications
 * @coversDefaultClass OkpoIdentification
 * @internal
 */
class OkpoIdentificationTest extends IdentificationTestCase
{
    protected const NUMBER = '12345678';
    protected const INVALID_NUMBER = '123';

    protected function setUp(): void
    {
        $this->fakeIdentification = new OkpoIdentification(static::NUMBER);
    }

    protected function expectedId(): string
    {
        return static::NUMBER;
    }

    /**
     * @expectedException \Wearesho\Pvbki\Exceptions\IdentificationValidationException
     * @expectedExceptionMessage Identification validation exception: OKPO number must be in 8 digits length
     */
    public function testInvalidNumber(): void
    {
        new OkpoIdentification(static::INVALID_NUMBER);
    }
}
