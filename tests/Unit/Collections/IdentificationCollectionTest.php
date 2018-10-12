<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\IdentificationCollection;
use Wearesho\Pvbki\Elements\Identification;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class IdentificationCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass IdentificationCollection
 * @internal
 */
class IdentificationCollectionTest extends CollectionTestCase
{
    /** @var IdentificationCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new IdentificationCollection();
    }

    public function expectedType(): string
    {
        return Identification::class;
    }
}
