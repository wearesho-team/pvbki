<?php

namespace Wearesho\Pvbki\Tests\Unit\Identifications;

use Wearesho\Pvbki\Identifications\PassportIdentification;
use Wearesho\Pvbki\Tests\IdentificationTestCase;

/**
 * Class PassportIdentificationTest
 * @package Wearesho\Pvbki\Tests\Unit\Identifications
 * @coversDefaultClass PassportIdentification
 * @internal
 */
class PassportIdentificationTest extends IdentificationTestCase
{
    protected const SERIES = 'АК';
    protected const INVALID_SERIES = 'asd';
    protected const NUMBER = '123456';
    protected const INVALID_NUMBER = '123';

    protected function setUp(): void
    {
        $this->fakeIdentification = new PassportIdentification(
            static::SERIES,
            static::NUMBER
        );
    }

    protected function expectedId(): string
    {
        return 'АК123456';
    }

    /**
     * @expectedException \Wearesho\Pvbki\Exceptions\IdentificationValidationException
     * @expectedExceptionMessage Identification validation exception: Passport series must be in 2 chars length
     */
    public function testInvalidSeries(): void
    {
        new PassportIdentification(static::INVALID_SERIES, static::NUMBER);
    }

    /**
     * @expectedException \Wearesho\Pvbki\Exceptions\IdentificationValidationException
     * @expectedExceptionMessage Identification validation exception: Passport number must be in 6 digits length
     */
    public function testInvalidNumber(): void
    {
        new PassportIdentification(static::SERIES, static::INVALID_NUMBER);
    }
}
