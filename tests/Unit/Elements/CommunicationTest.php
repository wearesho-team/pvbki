<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Communication;

/**
 * Class CommunicationTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Communication
 * @internal
 */
class CommunicationTest extends TestCase
{
    protected const VALUE = 'value';
    protected const TYPE_ID = 1;

    /** @var Communication */
    protected $fakeCommunication;

    protected function setUp(): void
    {
        $this->fakeCommunication = new Communication(
            static::VALUE,
            static::TYPE_ID
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'value' => static::VALUE,
                'typeId' => static::TYPE_ID,
            ],
            $this->fakeCommunication->jsonSerialize()
        );
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(static::TYPE_ID, $this->fakeCommunication->getTypeId());
    }

    public function testGetValue(): void
    {
        $this->assertEquals(static::VALUE, $this->fakeCommunication->getValue());
    }
}
