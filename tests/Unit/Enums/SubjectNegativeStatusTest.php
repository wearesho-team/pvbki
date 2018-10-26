<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\SubjectNegativeStatus;

/**
 * Class SubjectNegativeStatusTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass SubjectNegativeStatus
 * @internal
 */
class SubjectNegativeStatusTest extends TestCase
{
    public function testEnum(): void
    {
        $this->assertEquals(
            SubjectNegativeStatus::ASSETS_FROZEN_OR_SEIZED(),
            new SubjectNegativeStatus(SubjectNegativeStatus::ASSETS_FROZEN_OR_SEIZED)
        );
        $this->assertEquals(
            SubjectNegativeStatus::CASE_OF_BANKRUPTCY_STARTED(),
            new SubjectNegativeStatus(SubjectNegativeStatus::CASE_OF_BANKRUPTCY_STARTED)
        );
        $this->assertEquals(
            SubjectNegativeStatus::COURT_ACTION_BY_COMPANY(),
            new SubjectNegativeStatus(SubjectNegativeStatus::COURT_ACTION_BY_COMPANY)
        );
        $this->assertEquals(
            SubjectNegativeStatus::COURT_DECLARED_BANKRUPTCY(),
            new SubjectNegativeStatus(SubjectNegativeStatus::COURT_DECLARED_BANKRUPTCY)
        );
        $this->assertEquals(
            SubjectNegativeStatus::CRIMINAL_PROCEEDINGS_STARTED(),
            new SubjectNegativeStatus(SubjectNegativeStatus::CRIMINAL_PROCEEDINGS_STARTED)
        );
        $this->assertEquals(
            SubjectNegativeStatus::CUSTOMER_UNTRACEABLE_OR_DECEASED(),
            new SubjectNegativeStatus(SubjectNegativeStatus::CUSTOMER_UNTRACEABLE_OR_DECEASED)
        );
        $this->assertEquals(
            SubjectNegativeStatus::LIMITED_CIVIL_CAPABILITY(),
            new SubjectNegativeStatus(SubjectNegativeStatus::LIMITED_CIVIL_CAPABILITY)
        );
        $this->assertEquals(
            SubjectNegativeStatus::LIQUIDATION(),
            new SubjectNegativeStatus(SubjectNegativeStatus::LIQUIDATION)
        );
        $this->assertEquals(
            SubjectNegativeStatus::PROVEN_FRAUD(),
            new SubjectNegativeStatus(SubjectNegativeStatus::PROVEN_FRAUD)
        );
        $this->assertEquals(
            SubjectNegativeStatus::RECCURENCE_OF_FRAUD(),
            new SubjectNegativeStatus(SubjectNegativeStatus::RECCURENCE_OF_FRAUD)
        );
        $this->assertEquals(
            SubjectNegativeStatus::SUPERVISORY_ADMINISTRATION(),
            new SubjectNegativeStatus(SubjectNegativeStatus::SUPERVISORY_ADMINISTRATION)
        );
        $this->assertEquals(
            SubjectNegativeStatus::UNAUTHORIZED_DEBIT_BALANCE_ON_CURRENT_ACCOUNT(),
            new SubjectNegativeStatus(SubjectNegativeStatus::UNAUTHORIZED_DEBIT_BALANCE_ON_CURRENT_ACCOUNT)
        );
        $this->assertEquals(
            SubjectNegativeStatus::WITHOUT_NEGATIVE_STATUS(),
            new SubjectNegativeStatus(SubjectNegativeStatus::WITHOUT_NEGATIVE_STATUS)
        );

        $this->assertNull((new SubjectNegativeStatus(null))->jsonSerialize());
        $this->assertNull(SubjectNegativeStatus::UNDEFINED()->getValue());
    }
}
