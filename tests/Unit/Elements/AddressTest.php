<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Wearesho\Pvbki\Elements\Address;

use PHPUnit\Framework\TestCase;

/**
 * Class AddressTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass \Wearesho\Pvbki\Elements\Address
 * @internal
 */
class AddressTest extends TestCase
{
    protected const TYPE_ID = 1;
    protected const LOCATION_ID = 2;
    protected const STREET_UA = 'street_ua';
    protected const STREET_RU = 'street_ru';
    protected const STREET_EN = 'street_en';
    protected const POSTAL_CODE = 'postal_code';

    /** @var Address */
    protected $fakeAddress;

    protected function setUp(): void
    {
        $this->fakeAddress = new Address(
            static::TYPE_ID,
            static::LOCATION_ID,
            static::STREET_UA,
            static::STREET_RU,
            static::STREET_EN,
            static::POSTAL_CODE
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'typeId' => static::TYPE_ID,
                'locationId' => static::LOCATION_ID,
                'streetUA' => static::STREET_UA,
                'streetRU' => static::STREET_RU,
                'streetEN' => static::STREET_EN,
                'postalCode' => static::POSTAL_CODE
            ],
            $this->fakeAddress->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(Address::ROOT, Address::tag());
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(static::TYPE_ID, $this->fakeAddress->getTypeId());
    }

    public function testGetLocationId(): void
    {
        $this->assertEquals(static::LOCATION_ID, $this->fakeAddress->getLocationId());
    }

    public function testGetPostalCode(): void
    {
        $this->assertEquals(static::POSTAL_CODE, $this->fakeAddress->getPostalCode());
    }

    public function testGetStreetRU(): void
    {
        $this->assertEquals(static::STREET_RU, $this->fakeAddress->getStreetRU());
    }

    public function testGetStreetUA(): void
    {
        $this->assertEquals(static::STREET_UA, $this->fakeAddress->getStreetUA());
    }

    public function testGetStreetEN(): void
    {
        $this->assertEquals(static::STREET_EN, $this->fakeAddress->getStreetEN());
    }
}
