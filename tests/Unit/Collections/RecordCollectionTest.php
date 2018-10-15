<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\RecordCollection;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Record;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class RecordCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass RecordCollection
 * @internal
 */
class RecordCollectionTest extends CollectionTestCase
{
    /** @var RecordCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new RecordCollection();
    }

    public function expectedType(): string
    {
        return Record::class;
    }
}
