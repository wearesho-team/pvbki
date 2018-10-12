<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\DependantCollection;
use Wearesho\Pvbki\Elements\Dependant;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class DependantCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass DependantCollection
 * @internal
 */
class DependantCollectionTest extends CollectionTestCase
{
    /** @var DependantCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new DependantCollection();
    }

    public function expectedType(): string
    {
        return Dependant::class;
    }
}
