<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\MonthlyIncomeCollection;
use Wearesho\Pvbki\Elements\MonthlyIncome;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class MonthlyIncomeCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass MonthlyIncomeCollection
 * @internal
 */
class MonthlyIncomeCollectionTest extends CollectionTestCase
{
    /** @var MonthlyIncomeCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new MonthlyIncomeCollection();
    }

    public function expectedType(): string
    {
        return MonthlyIncome::class;
    }
}
