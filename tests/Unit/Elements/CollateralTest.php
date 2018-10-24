<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class CollateralTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass \Wearesho\Pvbki\Elements\Collateral
 * @internal
 */
class CollateralTest extends TestCase
{
    protected const CONTRACT_ID = 'contract_id';
    protected const VALUE = 2.34;
    protected const CURRENCY = 'currency';
    protected const LOCATION_ID = 4;
    protected const STREET_UA = 'street_ua';
    protected const STREET_RU = 'street_ru';
    protected const STREET_EN = 'street_en';
    protected const POSTAL_CODE = 'postal_code';
    protected const NUMBER = 'number';
    protected const REGISTRATION_DATE = '2017-05-12';
    protected const ISSUE_DATE = '2018-02-25';
    protected const EXPIRATION_DATE = '2020-01-01';
    protected const AUTHORITY_UA = 'authority_ua';
    protected const AUTHORITY_RU = 'authority_ru';
    protected const AUTHORITY_EN = 'authority_en';

    /** @var Pvbki\Elements\Collateral */
    protected $fakeCollateral;

    protected function setUp(): void
    {
        $this->fakeCollateral = new Pvbki\Elements\Collateral(
            static::CONTRACT_ID,
            Pvbki\Enums\CollateralType::CABINET_MINISTERS_GUARANTEES(),
            static::VALUE,
            static::CURRENCY,
            Pvbki\Enums\AddressType::COLLATERAL(),
            static::LOCATION_ID,
            new Pvbki\Sentence\Translation(
                static::STREET_UA,
                static::STREET_RU,
                static::STREET_EN
            ),
            static::POSTAL_CODE,
            Pvbki\Enums\IdentificationType::UNIQUE_NUMBER(),
            static::NUMBER,
            Carbon::parse(static::REGISTRATION_DATE),
            Carbon::parse(static::ISSUE_DATE),
            Carbon::parse(static::EXPIRATION_DATE),
            new Pvbki\Sentence\Translation(
                static::AUTHORITY_UA,
                static::AUTHORITY_RU,
                static::AUTHORITY_EN
            )
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'contractId' => static::CONTRACT_ID,
                'typeId' => Pvbki\Enums\CollateralType::CABINET_MINISTERS_GUARANTEES(),
                'value' => static::VALUE,
                'currency' => static::CURRENCY,
                'addressTypeId' => Pvbki\Enums\AddressType::COLLATERAL(),
                'locationId' => static::LOCATION_ID,
                'street' => new Pvbki\Sentence\Translation(
                    static::STREET_UA,
                    static::STREET_RU,
                    static::STREET_EN
                ),
                'postalCode' => static::POSTAL_CODE,
                'identificationTypeId' => Pvbki\Enums\IdentificationType::UNIQUE_NUMBER(),
                'number' => static::NUMBER,
                'registrationDate' => Carbon::parse(static::REGISTRATION_DATE),
                'issueDate' => Carbon::parse(static::ISSUE_DATE),
                'expirationDate' => Carbon::parse(static::EXPIRATION_DATE),
                'authority' => new Pvbki\Sentence\Translation(
                    static::AUTHORITY_UA,
                    static::AUTHORITY_RU,
                    static::AUTHORITY_EN
                ),
            ],
            $this->fakeCollateral->jsonSerialize()
        );
    }

    public function testGetAddressTypeId(): void
    {
        $this->assertEquals(Pvbki\Enums\AddressType::COLLATERAL(), $this->fakeCollateral->getAddressTypeId());
    }

    public function testGetValue(): void
    {
        $this->assertEquals(static::VALUE, $this->fakeCollateral->getValue());
    }

    public function testGetIssueDate(): void
    {
        $this->assertEquals(static::ISSUE_DATE, Carbon::make($this->fakeCollateral->getIssueDate())->toDateString());
    }

    public function testGetRegistrationDate(): void
    {
        $this->assertEquals(
            static::REGISTRATION_DATE,
            Carbon::make($this->fakeCollateral->getRegistrationDate())->toDateString()
        );
    }

    public function testGetIdentificationTypeId(): void
    {
        $this->assertEquals(
            Pvbki\Enums\IdentificationType::UNIQUE_NUMBER(),
            $this->fakeCollateral->getIdentificationTypeId()
        );
    }

    public function testGetStreet(): void
    {
        $this->assertEquals(
            new Pvbki\Sentence\Translation(
                static::STREET_UA,
                static::STREET_RU,
                static::STREET_EN
            ),
            $this->fakeCollateral->getStreet()
        );
    }

    public function testGetAuthority(): void
    {
        $this->assertEquals(
            new Pvbki\Sentence\Translation(
                static::AUTHORITY_UA,
                static::AUTHORITY_RU,
                static::AUTHORITY_EN
            ),
            $this->fakeCollateral->getAuthority()
        );
    }

    public function testGetLocationId(): void
    {
        $this->assertEquals(static::LOCATION_ID, $this->fakeCollateral->getLocationId());
    }

    public function testGetExpirationDate(): void
    {
        $this->assertEquals(
            static::EXPIRATION_DATE,
            Carbon::make($this->fakeCollateral->getExpirationDate())->toDateString()
        );
    }

    public function testGetContractId(): void
    {
        $this->assertEquals(static::CONTRACT_ID, $this->fakeCollateral->getContractId());
    }

    public function testGetPostalCode(): void
    {
        $this->assertEquals(static::POSTAL_CODE, $this->fakeCollateral->getPostalCode());
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(
            Pvbki\Enums\CollateralType::CABINET_MINISTERS_GUARANTEES(),
            $this->fakeCollateral->getTypeId()
        );
    }

    public function testGetCurrency(): void
    {
        $this->assertEquals(static::CURRENCY, $this->fakeCollateral->getCurrency());
    }

    public function testGetNumber(): void
    {
        $this->assertEquals(static::NUMBER, $this->fakeCollateral->getNumber());
    }
}
