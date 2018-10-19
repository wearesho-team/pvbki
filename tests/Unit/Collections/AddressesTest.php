<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class AddressesTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass \Wearesho\Pvbki\Collections\Addresses
 * @internal
 */
class AddressesTest extends TestCase
{
    /** @var Pvbki\Collections\Addresses */
    protected $fakeAddresses;

    protected function setUp(): void
    {
        $this->fakeAddresses = new Pvbki\Collections\Addresses();
    }

    public function testType(): void
    {
        $this->assertEquals(Pvbki\Elements\Address::class, $this->fakeAddresses->type());
    }
}
