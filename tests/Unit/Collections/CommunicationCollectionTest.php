<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\CommunicationCollection;
use Wearesho\Pvbki\Elements\Communication;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class CommunicationCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass CommunicationCollection
 * @internal
 */
class CommunicationCollectionTest extends CollectionTestCase
{
    /** @var CommunicationCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new CommunicationCollection();
    }

    public function expectedType(): string
    {
        return Communication::class;
    }
}
