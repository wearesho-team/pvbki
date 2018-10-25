<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Address;
use Wearesho\Pvbki\Enums\AddressType;
use Wearesho\Pvbki\Sentence\Translation;

/**
 * Class AddressTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Address
 * @internal
 */
class AddressTest extends TestCase
{
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
            static::LOCATION_ID,
            AddressType::COLLATERAL(),
            new Translation(
                static::STREET_UA,
                static::STREET_RU,
                static::STREET_EN
            ),
            static::POSTAL_CODE
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'locationId' => static::LOCATION_ID,
                'typeId' => AddressType::COLLATERAL(),
                'street' => new Translation(
                    static::STREET_UA,
                    static::STREET_RU,
                    static::STREET_EN
                ),
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
        $this->assertEquals(AddressType::COLLATERAL(), $this->fakeAddress->getTypeId());
    }

    public function testGetLocationId(): void
    {
        $this->assertEquals(static::LOCATION_ID, $this->fakeAddress->getLocationId());
    }

    public function testGetPostalCode(): void
    {
        $this->assertEquals(static::POSTAL_CODE, $this->fakeAddress->getPostalCode());
    }

    public function testGetStreet(): void
    {
        $this->assertEquals(
            new Translation(
                static::STREET_UA,
                static::STREET_RU,
                static::STREET_EN
            ),
            $this->fakeAddress->getStreet()
        );
    }
}
