<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\Contracts;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Contract;

/**
 * Class ContractsTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass Contracts
 * @internal
 */
class ContractsTest extends TestCase
{
    /** @var Contracts */
    protected $fakeContracts;

    protected function setUp(): void
    {
        $this->fakeContracts = new Contracts();
    }

    public function testType(): void
    {
        $this->assertEquals(Contract::class, $this->fakeContracts->type());
    }
}
