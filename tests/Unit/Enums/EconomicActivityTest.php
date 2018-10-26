<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\EconomicActivity;

/**
 * Class EconomicActivityTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass EconomicActivity
 * @internal
 */
class EconomicActivityTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(EconomicActivity::AGRICULTURE(), new EconomicActivity(EconomicActivity::AGRICULTURE));
        $this->assertEquals(EconomicActivity::BUILDING(), new EconomicActivity(EconomicActivity::BUILDING));
        $this->assertEquals(EconomicActivity::FORESTRY(), new EconomicActivity(EconomicActivity::FORESTRY));
        $this->assertEquals(EconomicActivity::INDUSTRY(), new EconomicActivity(EconomicActivity::INDUSTRY));
        $this->assertEquals(
            EconomicActivity::LOGISTICAL_SUPPORT_AND_SALE(),
            new EconomicActivity(EconomicActivity::LOGISTICAL_SUPPORT_AND_SALE)
        );
        $this->assertEquals(EconomicActivity::OTHER(), new EconomicActivity(EconomicActivity::OTHER));
        $this->assertEquals(
            EconomicActivity::TRADE_AND_PUBLIC_FEEDING(),
            new EconomicActivity(EconomicActivity::TRADE_AND_PUBLIC_FEEDING)
        );
        $this->assertEquals(
            EconomicActivity::TRANSPORT_AND_COMMUNICATION(),
            new EconomicActivity(EconomicActivity::TRANSPORT_AND_COMMUNICATION)
        );

        $this->assertNull((new EconomicActivity(null))->jsonSerialize());
        $this->assertNull(EconomicActivity::UNDEFINED()->getValue());
    }
}
