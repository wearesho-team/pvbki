<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\Residency;

/**
 * Class ResidencyTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass Residency
 * @internal
 */
class ResidencyTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Residency::FOREIGNER(), new Residency(Residency::FOREIGNER));
        $this->assertEquals(Residency::RESIDENT(), new Residency(Residency::RESIDENT));

        $this->assertNull((new Residency(null))->jsonSerialize());
        $this->assertNull(Residency::UNDEFINED()->getValue());
    }
}
