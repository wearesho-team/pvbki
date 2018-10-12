<?php

namespace Wearesho\Pvbki\Tests;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\BaseCollection;

/**
 * Class CollectionTestCase
 * @package Wearesho\Pvbki\Tests
 */
abstract class CollectionTestCase extends TestCase
{
    /** @var BaseCollection */
    protected $collection;

    public function testType(): void
    {
        $this->assertEquals($this->expectedType(), $this->collection->type());
    }

    abstract public function expectedType(): string;
}
