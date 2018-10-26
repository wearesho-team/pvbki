<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\ContractNegativeStatus;

/**
 * Class ContractNegativeStatusTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass ContractNegativeStatus
 * @internal
 */
class ContractNegativeStatusTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(ContractNegativeStatus::NONE(), new ContractNegativeStatus(ContractNegativeStatus::NONE));
        $this->assertEquals(
            ContractNegativeStatus::CREDIT_ASSIGNMENT_TO_THIRD_PARTY(),
            new ContractNegativeStatus(ContractNegativeStatus::CREDIT_ASSIGNMENT_TO_THIRD_PARTY)
        );
        $this->assertEquals(
            ContractNegativeStatus::UNAUTHORIZED_DEBIT_BALANCE_ON_CURRENT_ACCOUNT(),
            new ContractNegativeStatus(ContractNegativeStatus::UNAUTHORIZED_DEBIT_BALANCE_ON_CURRENT_ACCOUNT)
        );
        $this->assertEquals(
            ContractNegativeStatus::LOAN_TRANSFERRED_TO_LOSSES(),
            new ContractNegativeStatus(ContractNegativeStatus::LOAN_TRANSFERRED_TO_LOSSES)
        );
        $this->assertEquals(
            ContractNegativeStatus::LOAN_WRITTEN_OFF(),
            new ContractNegativeStatus(ContractNegativeStatus::LOAN_WRITTEN_OFF)
        );
        $this->assertEquals(
            ContractNegativeStatus::CREDIT_REASSIGNED_TO_NEW_BORROWER(),
            new ContractNegativeStatus(ContractNegativeStatus::CREDIT_REASSIGNED_TO_NEW_BORROWER)
        );
        $this->assertEquals(
            ContractNegativeStatus::BLOCKED(),
            new ContractNegativeStatus(ContractNegativeStatus::BLOCKED)
        );
        $this->assertEquals(
            ContractNegativeStatus::INCREASED_RISK(),
            new ContractNegativeStatus(ContractNegativeStatus::INCREASED_RISK)
        );
        $this->assertEquals(
            ContractNegativeStatus::CANCELLED_DUE_TO_DELAYED_PAYMENTS(),
            new ContractNegativeStatus(ContractNegativeStatus::CANCELLED_DUE_TO_DELAYED_PAYMENTS)
        );
        $this->assertEquals(
            ContractNegativeStatus::CONTRACT_STATUS_IS_NOT_NEGATIVE(),
            new ContractNegativeStatus(ContractNegativeStatus::CONTRACT_STATUS_IS_NOT_NEGATIVE)
        );
        $this->assertEquals(
            ContractNegativeStatus::FINANCIAL_INSTITUTION_CEASED_TO_EXIST(),
            new ContractNegativeStatus(ContractNegativeStatus::FINANCIAL_INSTITUTION_CEASED_TO_EXIST)
        );
        $this->assertEquals(
            ContractNegativeStatus::DOES_NOT_HAVE_TECHNICAL_OPPORTUNITY_TO_RENEW_INFORMATION(),
            new ContractNegativeStatus(ContractNegativeStatus::DOES_NOT_HAVE_TECHNICAL_OPPORTUNITY_TO_RENEW_INFORMATION)
        );
        $this->assertEquals(
            ContractNegativeStatus::SALE_OF_CREDIT(),
            new ContractNegativeStatus(ContractNegativeStatus::SALE_OF_CREDIT)
        );
        $this->assertEquals(
            ContractNegativeStatus::CNS_14(),
            new ContractNegativeStatus(ContractNegativeStatus::CNS_14)
        );
        $this->assertEquals(
            ContractNegativeStatus::DOES_NOT_HAVE_TECHNICAL_OPPORTUNITY_TO_PASS_HISTORICAL_INFORMATION(),
            new ContractNegativeStatus(
                ContractNegativeStatus::DOES_NOT_HAVE_TECHNICAL_OPPORTUNITY_TO_PASS_HISTORICAL_INFORMATION
            )
        );
        $this->assertEquals(
            ContractNegativeStatus::CREDIT_IS_RESTRUCTURED(),
            new ContractNegativeStatus(ContractNegativeStatus::CREDIT_IS_RESTRUCTURED)
        );
        $this->assertEquals(
            ContractNegativeStatus::INFORMATION_ABOUT_THE_CREDIT_IS_GIVEN_BY_MISTAKE(),
            new ContractNegativeStatus(ContractNegativeStatus::INFORMATION_ABOUT_THE_CREDIT_IS_GIVEN_BY_MISTAKE)
        );
        $this->assertEquals(
            ContractNegativeStatus::SPECIAL_TERMS(),
            new ContractNegativeStatus(ContractNegativeStatus::SPECIAL_TERMS)
        );

        $this->assertNull((new ContractNegativeStatus(null))->jsonSerialize());
        $this->assertNull(ContractNegativeStatus::UNDEFINED()->getValue());
    }
}
