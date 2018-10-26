<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\Status;

/**
 * Class StatusTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass Status
 * @internal
 */
class StatusTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Status::EXISTING(), new Status(Status::EXISTING));
        $this->assertEquals(Status::CLOSED(), new Status(Status::CLOSED));

        $this->assertNull((new Status(null))->jsonSerialize());
        $this->assertNull(Status::UNDEFINED()->getValue());
    }
}
