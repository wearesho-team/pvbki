<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class MonthlyIncomesTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass \Wearesho\Pvbki\Collections\MonthlyIncomes
 * @internal
 */
class MonthlyIncomesTest extends TestCase
{
    /** @var Pvbki\Collections\MonthlyIncomes */
    protected $fakeMonthlyIncomes;

    protected function setUp(): void
    {
        $this->fakeMonthlyIncomes = new Pvbki\Collections\MonthlyIncomes();
    }

    public function testType(): void
    {
        $this->assertEquals(Pvbki\Elements\MonthlyIncome::class, $this->fakeMonthlyIncomes->type());
    }
}
