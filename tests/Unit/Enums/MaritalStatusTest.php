<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\MaritalStatus;

/**
 * Class MaritalStatusTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 */
class MaritalStatusTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(MaritalStatus::DIVORCED(), new MaritalStatus(MaritalStatus::DIVORCED));
        $this->assertEquals(MaritalStatus::MARRIED(), new MaritalStatus(MaritalStatus::MARRIED));
        $this->assertEquals(MaritalStatus::MATE(), new MaritalStatus(MaritalStatus::MATE));
        $this->assertEquals(MaritalStatus::UNKNOWN(), new MaritalStatus(MaritalStatus::UNKNOWN));
        $this->assertEquals(MaritalStatus::UNMARRIED(), new MaritalStatus(MaritalStatus::UNMARRIED));
        $this->assertEquals(MaritalStatus::WIDOW(), new MaritalStatus(MaritalStatus::WIDOW));

        $this->assertNull((new MaritalStatus(null))->jsonSerialize());
        $this->assertNull(MaritalStatus::UNDEFINED()->getValue());
    }
}
