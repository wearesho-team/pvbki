<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class CollateralsTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass \Wearesho\Pvbki\Collections\Collaterals
 * @internal
 */
class CollateralsTest extends TestCase
{
    /** @var Pvbki\Collections\Collaterals */
    protected $fakeCollaterals;

    protected function setUp(): void
    {
        $this->fakeCollaterals = new Pvbki\Collections\Collaterals();
    }

    public function testType(): void
    {
        $this->assertEquals(Pvbki\Elements\Collateral::class, $this->fakeCollaterals->type());
    }
}
