<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use Wearesho\Pvbki\Enums\ContractNegativeStatus;
use PHPUnit\Framework\TestCase;

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
        $this->assertEquals(ContractNegativeStatus::CNS_0(), new ContractNegativeStatus(ContractNegativeStatus::CNS_0));
        $this->assertEquals(ContractNegativeStatus::CNS_1(), new ContractNegativeStatus(ContractNegativeStatus::CNS_1));
        $this->assertEquals(ContractNegativeStatus::CNS_2(), new ContractNegativeStatus(ContractNegativeStatus::CNS_2));
        $this->assertEquals(ContractNegativeStatus::CNS_3(), new ContractNegativeStatus(ContractNegativeStatus::CNS_3));
        $this->assertEquals(ContractNegativeStatus::CNS_4(), new ContractNegativeStatus(ContractNegativeStatus::CNS_4));
        $this->assertEquals(ContractNegativeStatus::CNS_5(), new ContractNegativeStatus(ContractNegativeStatus::CNS_5));
        $this->assertEquals(ContractNegativeStatus::CNS_6(), new ContractNegativeStatus(ContractNegativeStatus::CNS_6));
        $this->assertEquals(ContractNegativeStatus::CNS_7(), new ContractNegativeStatus(ContractNegativeStatus::CNS_7));
        $this->assertEquals(ContractNegativeStatus::CNS_8(), new ContractNegativeStatus(ContractNegativeStatus::CNS_8));
        $this->assertEquals(
            ContractNegativeStatus::CNS_10(),
            new ContractNegativeStatus(ContractNegativeStatus::CNS_10)
        );
        $this->assertEquals(
            ContractNegativeStatus::CNS_11(),
            new ContractNegativeStatus(ContractNegativeStatus::CNS_11)
        );
        $this->assertEquals(
            ContractNegativeStatus::CNS_12(),
            new ContractNegativeStatus(ContractNegativeStatus::CNS_12)
        );
        $this->assertEquals(
            ContractNegativeStatus::CNS_13(),
            new ContractNegativeStatus(ContractNegativeStatus::CNS_13)
        );
        $this->assertEquals(
            ContractNegativeStatus::CNS_14(),
            new ContractNegativeStatus(ContractNegativeStatus::CNS_14)
        );
        $this->assertEquals(
            ContractNegativeStatus::CNS_15(),
            new ContractNegativeStatus(ContractNegativeStatus::CNS_15)
        );
        $this->assertEquals(
            ContractNegativeStatus::CNS_16(),
            new ContractNegativeStatus(ContractNegativeStatus::CNS_16)
        );
        $this->assertEquals(
            ContractNegativeStatus::CNS_17(),
            new ContractNegativeStatus(ContractNegativeStatus::CNS_17)
        );
        $this->assertEquals(
            ContractNegativeStatus::CNS_18(),
            new ContractNegativeStatus(ContractNegativeStatus::CNS_18)
        );

        $this->assertNull((new ContractNegativeStatus(null))->jsonSerialize());
    }
}
