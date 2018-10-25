<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use Wearesho\Pvbki\Enums\ContractType;

use PHPUnit\Framework\TestCase;

/**
 * Class ContractTypeTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass ContractType
 * @internal
 */
class ContractTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(ContractType::BUSINESS(), new ContractType(ContractType::BUSINESS));
        $this->assertEquals(ContractType::CREDIT(), new ContractType(ContractType::CREDIT));
        $this->assertEquals(ContractType::INSTALMENT(), new ContractType(ContractType::INSTALMENT));
        $this->assertEquals(ContractType::LEASING(), new ContractType(ContractType::LEASING));
        $this->assertEquals(ContractType::NON_INSTALMENT(), new ContractType(ContractType::NON_INSTALMENT));

        $this->assertNull((new ContractType(null))->jsonSerialize());
        $this->assertNull(ContractType::UNDEFINED()->getValue());
    }
}
