<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\AddressType;
use Wearesho\Pvbki\Interrelations\NullableEnum;

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

        $this->assertInstanceOf(NullableEnum::class, new AddressType(null));
        $this->assertNull((new AddressType(null))->jsonSerialize());
        $this->assertNull(AddressType::UNDEFINED()->getValue());
    }
}
