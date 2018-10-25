<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use Wearesho\Pvbki\Enums\Gender;

use PHPUnit\Framework\TestCase;

/**
 * Class GenderTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass Gender
 * @internal
 */
class GenderTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Gender::MAN(), new Gender(Gender::MAN));
        $this->assertEquals(Gender::FEMALE(), new Gender(Gender::FEMALE));

        $this->assertNull((new Gender(null))->jsonSerialize());
        $this->assertNull(Gender::UNDEFINED()->getValue());
    }
}
