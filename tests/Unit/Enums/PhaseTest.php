<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\Phase;

/**
 * Class PhaseTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass Phase
 * @internal
 */
class PhaseTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Phase::EXISTING(), new Phase(Phase::EXISTING));
        $this->assertEquals(Phase::REJECTED(), new Phase(Phase::REJECTED));
        $this->assertEquals(Phase::REQUESTED(), new Phase(Phase::REQUESTED));
        $this->assertEquals(Phase::TERMINATED(), new Phase(Phase::TERMINATED));
        $this->assertEquals(Phase::TERMINATED_IN_ADVANCE(), new Phase(Phase::TERMINATED_IN_ADVANCE));
        $this->assertEquals(Phase::WITHDRAWN(), new Phase(Phase::WITHDRAWN));

        $this->assertNull((new Phase(null))->jsonSerialize());
        $this->assertNull(Phase::UNDEFINED()->getValue());
    }
}
