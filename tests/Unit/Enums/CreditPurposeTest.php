<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\CreditPurpose;

/**
 * Class CreditPurposeTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass CreditPurpose
 * @internal
 */
class CreditPurposeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            CreditPurpose::ADDITION_TURNOVER_LEGAL_ENTITY_MEANS(),
            new CreditPurpose(CreditPurpose::ADDITION_TURNOVER_LEGAL_ENTITY_MEANS)
        );
        $this->assertEquals(
            CreditPurpose::AQUISITION_INVESTMENT(),
            new CreditPurpose(CreditPurpose::AQUISITION_INVESTMENT)
        );
        $this->assertEquals(CreditPurpose::AVAL(), new CreditPurpose(CreditPurpose::AVAL));
        $this->assertEquals(CreditPurpose::BILL_OF_CREDIT(), new CreditPurpose(CreditPurpose::BILL_OF_CREDIT));
        $this->assertEquals(CreditPurpose::CAR_PURCHASE(), new CreditPurpose(CreditPurpose::CAR_PURCHASE));
        $this->assertEquals(CreditPurpose::CONSUMER_CREDIT(), new CreditPurpose(CreditPurpose::CONSUMER_CREDIT));
        $this->assertEquals(CreditPurpose::CREDIT_CARD(), new CreditPurpose(CreditPurpose::CREDIT_CARD));
        $this->assertEquals(CreditPurpose::FACTORING(), new CreditPurpose(CreditPurpose::FACTORING));
        $this->assertEquals(
            CreditPurpose::FURNITURE_PURCHASE(),
            new CreditPurpose(CreditPurpose::FURNITURE_PURCHASE)
        );
        $this->assertEquals(CreditPurpose::GUARANTEE(), new CreditPurpose(CreditPurpose::GUARANTEE));
        $this->assertEquals(
            CreditPurpose::INVESTMENT_PURPOSES(),
            new CreditPurpose(CreditPurpose::INVESTMENT_PURPOSES)
        );
        $this->assertEquals(CreditPurpose::MORTGAGE_LOAN(), new CreditPurpose(CreditPurpose::MORTGAGE_LOAN));
        $this->assertEquals(CreditPurpose::NOT_SPECIFIED(), new CreditPurpose(CreditPurpose::NOT_SPECIFIED));
        $this->assertEquals(
            CreditPurpose::OTHER_BUSINESS_PURPOSE(),
            new CreditPurpose(CreditPurpose::OTHER_BUSINESS_PURPOSE)
        );
        $this->assertEquals(
            CreditPurpose::OTHER_CONSUMER_PURPOSE(),
            new CreditPurpose(CreditPurpose::OTHER_CONSUMER_PURPOSE)
        );
        $this->assertEquals(CreditPurpose::OVERDRAFT(), new CreditPurpose(CreditPurpose::OVERDRAFT));
        $this->assertEquals(
            CreditPurpose::PERSONAL_CREDIT_WITH_ASSURANCE(),
            new CreditPurpose(CreditPurpose::PERSONAL_CREDIT_WITH_ASSURANCE)
        );
        $this->assertEquals(
            CreditPurpose::AQUISITION_INVESTMENT(),
            new CreditPurpose(CreditPurpose::AQUISITION_INVESTMENT)
        );
        $this->assertEquals(
            CreditPurpose::PERSONAL_CREDIT_WITHOUT_ASSURANCE(),
            new CreditPurpose(CreditPurpose::PERSONAL_CREDIT_WITHOUT_ASSURANCE)
        );
        $this->assertEquals(
            CreditPurpose::REPLENISHMENT_CURRENT_ASSETS(),
            new CreditPurpose(CreditPurpose::REPLENISHMENT_CURRENT_ASSETS)
        );

        $this->assertNull((new CreditPurpose(null))->jsonSerialize());
        $this->assertNull(CreditPurpose::UNDEFINED()->getValue());
    }
}
