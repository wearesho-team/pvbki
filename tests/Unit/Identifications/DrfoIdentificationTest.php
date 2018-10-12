<?php

namespace Wearesho\Pvbki\Tests\Unit\Identifications;

use Wearesho\Pvbki\Identifications\DrfoIdentification;
use Wearesho\Pvbki\Tests\IdentificationTestCase;

/**
 * Class DrfoIdentificationTest
 * @package Wearesho\Pvbki\Tests\Unit\Identifications
 * @coversDefaultClass DrfoIdentification
 * @internal
 */
class DrfoIdentificationTest extends IdentificationTestCase
{
    protected const NUMBER = '1234567890';
    protected const INVALID_NUMBER = '123';

    protected function setUp(): void
    {
        $this->fakeIdentification = new DrfoIdentification(static::NUMBER);
    }

    public function expectedId(): string
    {
        return static::NUMBER;
    }

    /**
     * @expectedException \Wearesho\Pvbki\Exceptions\IdentificationValidationException
     * @expectedExceptionMessage Identification validation exception: DRFO number must be in 10 digits length
     */
    public function testInvalidNumber(): void
    {
        new DrfoIdentification(static::INVALID_NUMBER);
    }
}
