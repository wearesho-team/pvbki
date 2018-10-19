<?php

namespace Wearesho\Pvbki\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Infrastructure\BaseCollection;

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
                return \stdClass::class;
            }
        };

        parent::setUp();
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Element Exception must be instance of stdClass
     */
    public function testInstanceWithInvalidArgument(): void
    {
        new $this->collection([new \Exception()]);
    }

    public function testAppends(): void
    {
        $this->collection->append(new \stdClass());
        $this->collection->append(new \stdClass());
        $this->collection->append(new \stdClass());

        $this->assertCount(3, $this->collection);
        $this->assertEquals(new \stdClass(), $this->collection->offsetGet(0));
        $this->assertEquals(new \stdClass(), $this->collection->offsetGet(1));
        $this->assertEquals(new \stdClass(), $this->collection->offsetGet(2));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Element Exception must be instance of stdClass
     */
    public function testAppendInvalidElement(): void
    {
        $this->collection->append(new \Exception());
    }

    public function testJsonSerialize(): void
    {
        $this->collection->append(new \stdClass());
        $this->collection->append(new \stdClass());
        $this->collection->append(new \stdClass());

        $this->assertArraySubset(
            [
                new \stdClass(),
                new \stdClass(),
                new \stdClass(),
            ],
            $this->collection->jsonSerialize()
        );
    }

    public function testArrayObjectAccess(): void
    {
        $this->assertEquals(0, count($this->collection));

        $this->collection->append(new \stdClass());
        $this->collection->append(new \stdClass());
        $this->collection->append(new \stdClass());

        $element = new \stdClass();
        $this->collection[] = $element;

        $this->assertEquals(4, count($this->collection));
        $this->assertEquals($element, $this->collection->offsetGet(3));
    }
}
