<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\CollateralCollection;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Collateral;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class CollateralCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass CollateralCollection
 * @internal
 */
class CollateralCollectionTest extends CollectionTestCase
{
    /** @var CollateralCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new CollateralCollection();
    }

    public function expectedType(): string
    {
        return Collateral::class;
    }
}
