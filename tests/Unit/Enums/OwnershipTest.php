<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\Ownership;

/**
 * Class OwnershipTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass Ownership
 * @internal
 */
class OwnershipTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Ownership::COOPERATIVES(), new Ownership(Ownership::COOPERATIVES));
        $this->assertEquals(Ownership::ECONOMIC_COMPANIES(), new Ownership(Ownership::ECONOMIC_COMPANIES));
        $this->assertEquals(Ownership::ENTERPRISES(), new Ownership(Ownership::ENTERPRISES));
        $this->assertEquals(Ownership::ENTERPRISES_UNIONS(), new Ownership(Ownership::ENTERPRISES_UNIONS));
        $this->assertEquals(Ownership::ORGANIZATIONS(), new Ownership(Ownership::ORGANIZATIONS));
        $this->assertEquals(Ownership::ORGANIZATIONS_UNIONS(), new Ownership(Ownership::ORGANIZATIONS_UNIONS));
        $this->assertEquals(Ownership::OTHER_LEGAL_FORMS(), new Ownership(Ownership::OTHER_LEGAL_FORMS));
        $this->assertEquals(Ownership::OTHER_INDIVIDUAL(), new Ownership(Ownership::OTHER_INDIVIDUAL));
        $this->assertEquals(Ownership::SEPARATED_BRANCHES(), new Ownership(Ownership::SEPARATED_BRANCHES));

        $this->assertNull((new Ownership(null))->jsonSerialize());
        $this->assertNull(Ownership::UNDEFINED()->getValue());
    }
}
