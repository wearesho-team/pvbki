<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Address;
use Wearesho\Pvbki\ParameterType;

/**
 * Class AddressTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Address
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
                'street' => [
                    'ua' => static::STREET_UA,
                    'ru' => static::STREET_RU,
                    'en' => static::STREET_EN,
                ],
                'postalCode' => static::POSTAL_CODE,
            ],
            $this->fakeAddress->jsonSerialize()
        );
    }

    public function testParameters(): void
    {
        $this->assertArraySubset(
            [
                Address::TYPE_ID => ParameterType::INTEGER,
                Address::LOCATION_ID => ParameterType::INTEGER,
                Address::STREET_UA => ParameterType::STRING,
                Address::STREET_RU => ParameterType::STRING,
                Address::STREET_EN => ParameterType::STRING,
                Address::POSTAL_CODE => ParameterType::STRING,
            ],
            Address::parameters()
        );
    }

    public function testGetPostalCode(): void
    {
        $this->assertEquals(static::POSTAL_CODE, $this->fakeAddress->getPostalCode());
    }

    public function testGetLocationId(): void
    {
        $this->assertEquals(static::LOCATION_ID, $this->fakeAddress->getLocationId());
    }

    public function testGetStreetEn(): void
    {
        $this->assertEquals(static::STREET_EN, $this->fakeAddress->getStreetEn());
    }

    public function testGetStreetRu(): void
    {
        $this->assertEquals(static::STREET_RU, $this->fakeAddress->getStreetRu());
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(static::TYPE_ID, $this->fakeAddress->getTypeId());
    }

    public function testGetStreetUa(): void
    {
        $this->assertEquals(static::STREET_UA, $this->fakeAddress->getStreetUa());
    }
}
