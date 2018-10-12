<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Dependant;
use Wearesho\Pvbki\ParameterType;

/**
 * Class DependantTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Dependant
 * @internal
 */
class DependantTest extends TestCase
{
    protected const TYPE_ID = 1;
    protected const COUNT = 10;

    /** @var Dependant */
    protected $fakeDependant;

    protected function setUp(): void
    {
        $this->fakeDependant = new Dependant(
            static::TYPE_ID,
            static::COUNT
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'typId' => static::TYPE_ID,
                'count' => static::COUNT,
            ],
            $this->fakeDependant->jsonSerialize()
        );
    }

    public function testParameters(): void
    {
        $this->assertArraySubset(
            [
                Dependant::TYPE_ID => ParameterType::INTEGER,
                Dependant::COUNT => ParameterType::INTEGER,
            ],
            Dependant::parameters()
        );
    }

    public function testGetCount(): void
    {
        $this->assertEquals(static::COUNT, $this->fakeDependant->getCount());
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(static::TYPE_ID, $this->fakeDependant->getTypeId());
    }
}
