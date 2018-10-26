<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use Wearesho\Pvbki\Enums\EmployeeCount;

use PHPUnit\Framework\TestCase;

/**
 * Class EmployeeCountTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass EmployeeCount
 * @internal
 */
class EmployeeCountTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(EmployeeCount::FROM_1_TO_5(), new EmployeeCount(EmployeeCount::FROM_1_TO_5));
        $this->assertEquals(EmployeeCount::FROM_6_TO_30(), new EmployeeCount(EmployeeCount::FROM_6_TO_30));
        $this->assertEquals(EmployeeCount::FROM_31_TO_100(), new EmployeeCount(EmployeeCount::FROM_31_TO_100));
        $this->assertEquals(EmployeeCount::FROM_101_TO_500(), new EmployeeCount(EmployeeCount::FROM_101_TO_500));
        $this->assertEquals(EmployeeCount::MORE_THAN_500(), new EmployeeCount(EmployeeCount::MORE_THAN_500));

        $this->assertNull((new EmployeeCount(null))->jsonSerialize());
        $this->assertNull(EmployeeCount::UNDEFINED()->getValue());
    }
}
