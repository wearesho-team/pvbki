<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Communication;
use Wearesho\Pvbki\ParameterType;

/**
 * Class CommunicationTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Communication
 * @internal
 */
class CommunicationTest extends TestCase
{
    protected const TYPE_ID = 1;
    protected const VALUE = 'value';

    /** @var Communication */
    protected $fakeCommunication;

    protected function setUp(): void
    {
        $this->fakeCommunication = new Communication(
            static::TYPE_ID,
            static::VALUE
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'typeId' => static::TYPE_ID,
                'value' => static::VALUE,
            ],
            $this->fakeCommunication->jsonSerialize()
        );
    }

    public function testParameters(): void
    {
        $this->assertArraySubset(
            [
                Communication::TYPE_ID => ParameterType::INTEGER,
                Communication::VALUE => ParameterType::STRING,
            ],
            Communication::parameters()
        );
    }

    public function testGetValue(): void
    {
        $this->assertEquals(static::VALUE, $this->fakeCommunication->getValue());
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(static::TYPE_ID, $this->fakeCommunication->getTypeId());
    }
}
