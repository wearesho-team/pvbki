<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class CommunicationTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass \Wearesho\Pvbki\Enums\CommunicationType
 * @internal
 */
class CommunicationTest extends TestCase
{
    protected const VALUE = 'value';

    /** @var Pvbki\Elements\Communication */
    protected $fakeCommunication;

    protected function setUp(): void
    {
        $this->fakeCommunication = new Pvbki\Elements\Communication(
            static::VALUE,
            Pvbki\Enums\CommunicationType::MAIL()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'value' => static::VALUE,
                'typeId' => Pvbki\Enums\CommunicationType::MAIL(),
            ],
            $this->fakeCommunication->jsonSerialize()
        );
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(Pvbki\Enums\CommunicationType::MAIL(), $this->fakeCommunication->getTypeId());
    }

    public function testGetValue(): void
    {
        $this->assertEquals(static::VALUE, $this->fakeCommunication->getValue());
    }

    public function testJsonSerializeWithNullEnum(): void
    {
        $communication = new Pvbki\Elements\Communication(
            static::VALUE,
            new Pvbki\Enums\CommunicationType(null)
        );

        $this->assertArraySubset(
            [
                'value' => static::VALUE,
                'typeId' => null,
            ],
            json_decode(json_encode($communication), true)
        );
    }
}
