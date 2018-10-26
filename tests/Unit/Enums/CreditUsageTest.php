<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\CreditUsage;

/**
 * Class CreditUsageTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass CreditUsage
 * @internal
 */
class CreditUsageTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(CreditUsage::OUT(), new CreditUsage(CreditUsage::OUT));
        $this->assertEquals(CreditUsage::IN(), new CreditUsage(CreditUsage::IN));
        $this->assertEquals(CreditUsage::NO(), new CreditUsage(CreditUsage::NO));

        $this->assertNull((new CreditUsage(null))->jsonSerialize());
        $this->assertNull(CreditUsage::UNDEFINED()->getValue());
    }
}
