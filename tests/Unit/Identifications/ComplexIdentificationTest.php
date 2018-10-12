<?php

namespace Wearesho\Pvbki\Tests\Unit\Identifications;

use Carbon\Carbon;
use Wearesho\Pvbki\Identifications\ComplexIdentification;
use Wearesho\Pvbki\Tests\IdentificationTestCase;

/**
 * Class ComplexIdentificationTest
 * @package Wearesho\Pvbki\Tests\Unit\Identifications
 * @coversDefaultClass ComplexIdentification
 * @internal
 */
class ComplexIdentificationTest extends IdentificationTestCase
{
    protected const NAME = 'Name';
    protected const SURNAME = 'Surname';
    protected const BIRTH_DATE = '2018-03-12';

    protected function setUp(): void
    {
        $this->fakeIdentification = new ComplexIdentification(
            static::NAME,
            static::SURNAME,
            Carbon::parse(static::BIRTH_DATE)
        );
    }

    protected function expectedId(): string
    {
        return 'NameSurname12032018';
    }
}
