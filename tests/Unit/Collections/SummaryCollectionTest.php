<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\SummaryCollection;
use Wearesho\Pvbki\Elements\Summary;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class SummaryCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass SummaryCollection
 * @internal
 */
class SummaryCollectionTest extends CollectionTestCase
{
    /** @var SummaryCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new SummaryCollection();
    }

    public function expectedType(): string
    {
        return Summary::class;
    }
}
