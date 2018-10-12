<?php

namespace Wearesho\Pvbki\Tests\Unit\Collections;

use Wearesho\Pvbki\Collections\ErrorCollection;
use Wearesho\Pvbki\Elements\Error;
use Wearesho\Pvbki\Tests\CollectionTestCase;

/**
 * Class ErrorCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit\Collections
 * @coversDefaultClass ErrorCollection
 * @internal
 */
class ErrorCollectionTest extends CollectionTestCase
{
    /** @var ErrorCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new ErrorCollection();
    }

    public function expectedType(): string
    {
        return Error::class;
    }
}
