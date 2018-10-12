<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Identification;
use Wearesho\Pvbki\ParameterType;

/**
 * Class IdentificationTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Identification
 * @internal
 */
class IdentificationTest extends TestCase
{
    protected const TYPE_ID = 1;
    protected const NUMBER = 'number';
    protected const REGISTRATION_DATE = '2017-06-15 00:00:00';
    protected const EXPIRATION_DATE = '2020-01-01 00:00:00';
    protected const ISSUED_BY_UA = 'issued_by_ua';
    protected const ISSUED_BY_RU = 'issued_by_ru';
    protected const ISSUED_BY_EN = 'issued_by_en';

    /** @var Identification */
    protected $fakeIdentification;

    protected function setUp(): void
    {
        $this->fakeIdentification = new Identification(
            static::TYPE_ID,
            static::NUMBER,
            Carbon::parse(static::REGISTRATION_DATE),
            Carbon::parse(static::EXPIRATION_DATE),
            static::ISSUED_BY_UA,
            static::ISSUED_BY_RU,
            static::ISSUED_BY_EN
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'typeId' => static::TYPE_ID,
                'number' => static::NUMBER,
                'registrationDate' => static::REGISTRATION_DATE,
                'expirationDate' => static::EXPIRATION_DATE,
                'issuedBy' => [
                    'ua' => static::ISSUED_BY_UA,
                    'ru' => static::ISSUED_BY_RU,
                    'en' => static::ISSUED_BY_EN,
                ],
            ],
            $this->fakeIdentification->jsonSerialize()
        );
    }

    public function testParameters(): void
    {
        $this->assertArraySubset(
            [
                Identification::TYPE_ID => ParameterType::INTEGER,
                Identification::NUMBER => ParameterType::STRING,
                Identification::REGISTRATION_DATE => ParameterType::DATE,
                Identification::EXPIRATION_DATE => ParameterType::DATE,
                Identification::ISSUED_BY_UA => ParameterType::STRING,
                Identification::ISSUED_BY_RU => ParameterType::STRING,
                Identification::ISSUED_BY_EN => ParameterType::STRING,
            ],
            Identification::parameters()
        );
    }

    public function testGetIssuedByEn(): void
    {
        $this->assertEquals(static::ISSUED_BY_EN, $this->fakeIdentification->getIssuedByEn());
    }

    public function testGetNumber(): void
    {
        $this->assertEquals(static::NUMBER, $this->fakeIdentification->getNumber());
    }

    public function testGetIssuedByUa(): void
    {
        $this->assertEquals(static::ISSUED_BY_UA, $this->fakeIdentification->getIssuedByUa());
    }

    public function testGetIssuedByRu(): void
    {
        $this->assertEquals(static::ISSUED_BY_RU, $this->fakeIdentification->getIssuedByRu());
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(static::TYPE_ID, $this->fakeIdentification->getTypeId());
    }

    public function testGetExpirationDate(): void
    {
        $this->assertEquals(Carbon::parse(static::EXPIRATION_DATE), $this->fakeIdentification->getExpirationDate());
    }

    public function testGetRegistrationDate(): void
    {
        $this->assertEquals(Carbon::parse(static::REGISTRATION_DATE), $this->fakeIdentification->getRegistrationDate());
    }
}
