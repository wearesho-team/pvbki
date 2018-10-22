<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use Wearesho\Pvbki\Enums\AddressType;

use PHPUnit\Framework\TestCase;

/**
 * Class AddressTypeTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass AddressType
 * @internal
 */
class AddressTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(AddressType::REGISTRATION(), new AddressType(AddressType::REGISTRATION));
        $this->assertEquals(AddressType::FACTUAL(), new AddressType(AddressType::FACTUAL));
        $this->assertEquals(AddressType::POSTAL(), new AddressType(AddressType::POSTAL));
        $this->assertEquals(AddressType::CURRENT_EMPLOYMENT(), new AddressType(AddressType::CURRENT_EMPLOYMENT));
        $this->assertEquals(AddressType::PREVIOUS_EMPLOYMENT(), new AddressType(AddressType::PREVIOUS_EMPLOYMENT));
        $this->assertEquals(AddressType::COLLATERAL(), new AddressType(AddressType::COLLATERAL));
    }
}
