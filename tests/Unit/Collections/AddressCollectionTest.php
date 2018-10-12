<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\AddressCollection;
use Wearesho\Pvbki\Elements\Address;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class AddressCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass AddressCollection
 * @internal
 */
class AddressCollectionTest extends CollectionTestCase
{
    /** @var AddressCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new AddressCollection();
    }

    public function expectedType(): string
    {
        return Address::class;
    }
}
