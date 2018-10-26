<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\Role;

/**
 * Class RoleTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass Role
 * @internal
 */
class RoleTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Role::BORROWER(), new Role(Role::BORROWER));
        $this->assertEquals(Role::ACCIDENT_WITNESS(), new Role(Role::ACCIDENT_WITNESS));
        $this->assertEquals(Role::CHIEF_ACCOUNTANT(), new Role(Role::CHIEF_ACCOUNTANT));
        $this->assertEquals(Role::CLAIMANT(), new Role(Role::CLAIMANT));
        $this->assertEquals(Role::CO_DEBTOR(), new Role(Role::CO_DEBTOR));
        $this->assertEquals(Role::DIRECTOR(), new Role(Role::DIRECTOR));
        $this->assertEquals(Role::GUARANTOR(), new Role(Role::GUARANTOR));
        $this->assertEquals(Role::INSURANCE_PREMIUM_PAYER(), new Role(Role::INSURANCE_PREMIUM_PAYER));
        $this->assertEquals(Role::INSURED(), new Role(Role::INSURED));
        $this->assertEquals(Role::LIQUIDATOR(), new Role(Role::LIQUIDATOR));
        $this->assertEquals(Role::PARTNER(), new Role(Role::PARTNER));
        $this->assertEquals(Role::WIFE_OR_HUSBAND(), new Role(Role::WIFE_OR_HUSBAND));

        $this->assertNull((new Role(null))->jsonSerialize());
        $this->assertNull(Role::UNDEFINED()->getValue());
    }
}
