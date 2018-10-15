<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Address;
use Wearesho\Pvbki\Elements\Translator;
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
        $this->fakeAddress = new Address([
            Address::TYPE_ID => static::TYPE_ID,
            Address::LOCATION_ID => static::LOCATION_ID,
            Address::STREET => new Translator([
                Translator::UA => static::STREET_UA,
                Translator::RU => static::STREET_RU,
                Translator::EN => static::STREET_EN
            ]),
            Address::POSTAL_CODE => static::POSTAL_CODE
        ]);
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'typeId' => static::TYPE_ID,
                'locationId' => static::LOCATION_ID,
                'street' => new Translator([
                    Translator::UA => static::STREET_UA,
                    Translator::RU => static::STREET_RU,
                    Translator::EN => static::STREET_EN
                ]),
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
                Address::STREET => Translator::class,
                Address::POSTAL_CODE => ParameterType::STRING,
            ],
            Address::parameters()
        );
    }

    public function testTranslators(): void
    {
        $this->assertArraySubset(
            [
                Address::STREET => [
                    Address::STREET_UA,
                    Address::STREET_RU,
                    Address::STREET_EN,
                ],
            ],
            Address::translators()
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
        $this->assertEquals(static::STREET_EN, $this->fakeAddress->getStreet()->getEn());
    }

    public function testGetStreetRu(): void
    {
        $this->assertEquals(static::STREET_RU, $this->fakeAddress->getStreet()->getRu());
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(static::TYPE_ID, $this->fakeAddress->getTypeId());
    }

    public function testGetStreetUa(): void
    {
        $this->assertEquals(static::STREET_UA, $this->fakeAddress->getStreet()->getUa());
    }
}
