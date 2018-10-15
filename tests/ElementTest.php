<?php

namespace Wearesho\Pvbki\Tests;

use Wearesho\Pvbki\Element;

use PHPUnit\Framework\TestCase;

/**
 * Class ElementTest
 * @package Wearesho\Pvbki\Tests
 * @coversDefaultClass Element
 * @internal
 */
class ElementTest extends TestCase
{
    /** @var Element */
    protected $fakeElement;

    protected function setUp(): void
    {
        $this->fakeElement = new class extends Element
        {
            /** @var string */
            protected $name;

            /** @var int */
            protected $age;
        };
    }

    public function testSet(): void
    {
        $this->fakeElement->name = 'Name';
        $this->fakeElement->age = 18;

        $this->expectException(\InvalidArgumentException::class);
        $this->fakeElement->name = 'NewName';
    }

    public function testGet(): void
    {
        $this->fakeElement->name = 'Name';
        $this->fakeElement->age = 18;

        $this->assertEquals('Name', $this->fakeElement->name);
        $this->assertEquals(18, $this->fakeElement->age);
    }
}
