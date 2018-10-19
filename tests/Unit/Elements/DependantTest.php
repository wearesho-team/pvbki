<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Wearesho\Pvbki\Elements\Dependant;

use PHPUnit\Framework\TestCase;

/**
 * Class DependantTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Dependant
 * @internal
 */
class DependantTest extends TestCase
{
    protected const COUNT = 10;
    protected const TYPE_ID = 1;

    /** @var Dependant */
    protected $fakeDependant;

    protected function setUp(): void
    {
        $this->fakeDependant = new Dependant(
            static::COUNT,
            static::TYPE_ID
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'count' => static::COUNT,
                'typeId' => static::TYPE_ID,
            ],
            $this->fakeDependant->jsonSerialize()
        );
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(static::TYPE_ID, $this->fakeDependant->getTypeId());
    }

    public function testGetCount(): void
    {
        $this->assertEquals(static::COUNT, $this->fakeDependant->getCount());
    }
}
