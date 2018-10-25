<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\PaymentPeriod;

/**
 * Class PaymentPeriodTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass PaymentPeriod
 * @internal
 */
class PaymentPeriodTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            PaymentPeriod::ADVANCED_MONTHLY_PAYMENTS(),
            new PaymentPeriod(PaymentPeriod::ADVANCED_MONTHLY_PAYMENTS)
        );
        $this->assertEquals(PaymentPeriod::AT_THE_FINAL_DAY(), new PaymentPeriod(PaymentPeriod::AT_THE_FINAL_DAY));
        $this->assertEquals(PaymentPeriod::EVERY_15_DAYS(), new PaymentPeriod(PaymentPeriod::EVERY_15_DAYS));
        $this->assertEquals(PaymentPeriod::EVERY_30_DAYS(), new PaymentPeriod(PaymentPeriod::EVERY_30_DAYS));
        $this->assertEquals(PaymentPeriod::EVERY_60_DAYS(), new PaymentPeriod(PaymentPeriod::EVERY_60_DAYS));
        $this->assertEquals(PaymentPeriod::EVERY_90_DAYS(), new PaymentPeriod(PaymentPeriod::EVERY_90_DAYS));
        $this->assertEquals(PaymentPeriod::EVERY_120_DAYS(), new PaymentPeriod(PaymentPeriod::EVERY_120_DAYS));
        $this->assertEquals(PaymentPeriod::EVERY_150_DAYS(), new PaymentPeriod(PaymentPeriod::EVERY_150_DAYS));
        $this->assertEquals(PaymentPeriod::EVERY_180_DAYS(), new PaymentPeriod(PaymentPeriod::EVERY_180_DAYS));
        $this->assertEquals(PaymentPeriod::EVERY_360_DAYS(), new PaymentPeriod(PaymentPeriod::EVERY_360_DAYS));
        $this->assertEquals(
            PaymentPeriod::IRREGULAR_INSTALMENTS(),
            new PaymentPeriod(PaymentPeriod::IRREGULAR_INSTALMENTS)
        );

        $this->assertNull((new PaymentPeriod(null))->jsonSerialize());
        $this->assertNull(PaymentPeriod::UNDEFINED()->getValue());
    }
}
