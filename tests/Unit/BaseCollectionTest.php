<?php

namespace Wearesho\Pvbki\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Tests\Mocks\Element;

/**
 * Class BaseCollectionTest
 * @package Wearesho\Pvbki\Tests\Unit
 */
class BaseCollectionTest extends TestCase
{
    /** @var BaseCollection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new class extends BaseCollection
        {
            public function type(): string
            {
                return Element::class;
            }
        };

        parent::setUp();
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Element Exception must be instance of Wearesho\Pvbki\Tests\Mocks\Element
     */
    public function testInstanceWithInvalidArgument(): void
    {
        new $this->collection([new \Exception()]);
    }

    public function testAppends(): void
    {
        $values = [
            mt_rand(),
            mt_rand(),
            mt_rand(),
        ];

        $this->collection->append(new Element($values[0]));
        $this->collection->append(new Element($values[1]));
        $this->collection->append(new Element($values[2]));

        $this->assertEquals($values[0], $this->collection->offsetGet(0)->getValue());
        $this->assertEquals($values[1], $this->collection->offsetGet(1)->getValue());
        $this->assertEquals($values[2], $this->collection->offsetGet(2)->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Element Exception must be instance of Wearesho\Pvbki\Tests\Mocks\Element
     */
    public function testAppendInvalidElement(): void
    {
        $this->collection->append(new \Exception());
    }

    public function testJsonSerialize(): void
    {
        $values = [
            mt_rand(),
            mt_rand(),
            mt_rand(),
        ];

        $this->collection->append(new Element($values[0]));
        $this->collection->append(new Element($values[1]));
        $this->collection->append(new Element($values[2]));

        $this->assertEquals((array)$this->collection, $this->collection->jsonSerialize());
    }

    public function testArrayObjectAccess(): void
    {
        $this->assertEquals(0, count($this->collection));

        $values = [
            mt_rand(),
            mt_rand(),
            mt_rand(),
            mt_rand(),
        ];

        $this->collection->append(new Element($values[0]));
        $this->collection->append(new Element($values[1]));
        $this->collection->append(new Element($values[2]));

        $element = new Element($values[3]);
        $this->collection[] = $element;

        $this->assertEquals(4, count($this->collection));
        $this->assertEquals($element, $this->collection->offsetGet(3));
    }
}
