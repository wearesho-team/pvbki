<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Elements\Collateral;

/**
 * Class CollateralTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass Collateral
 * @internal
 */
class CollateralTest extends TestCase
{
    protected const CONTRACT_ID = 'contract_id';
    protected const TYPE_ID = 1;
    protected const VALUE = 2.34;
    protected const CURRENCY = 'currency';
    protected const ADDRESS_TYPE_ID = 3;
    protected const LOCATION_ID = 4;
    protected const STREET_UA = 'street_ua';
    protected const STREET_RU = 'street_ru';
    protected const STREET_EN = 'street_en';
    protected const POSTAL_CODE = 'postal_code';
    protected const IDENTIFICATION_TYPE_ID = 5;
    protected const NUMBER = 'number';
    protected const REGISTRATION_DATE = '2017-05-12';
    protected const ISSUE_DATE = '2018-02-25';
    protected const EXPIRATION_DATE = '2020-01-01';
    protected const AUTHORITY_UA = 'authority_ua';
    protected const AUTHORITY_RU = 'authority_ru';
    protected const AUTHORITY_EN = 'authority_en';

    /** @var Collateral */
    protected $fakeCollateral;

    protected function setUp(): void
    {
        $this->fakeCollateral = new Collateral(
            static::CONTRACT_ID,
            static::TYPE_ID,
            static::VALUE,
            static::CURRENCY,
            static::ADDRESS_TYPE_ID,
            static::LOCATION_ID,
            static::STREET_UA,
            static::STREET_RU,
            static::STREET_EN,
            static::POSTAL_CODE,
            static::IDENTIFICATION_TYPE_ID,
            static::NUMBER,
            Carbon::parse(static::REGISTRATION_DATE),
            Carbon::parse(static::ISSUE_DATE),
            Carbon::parse(static::EXPIRATION_DATE),
            static::AUTHORITY_UA,
            static::AUTHORITY_RU,
            static::AUTHORITY_EN
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'contractId' => static::CONTRACT_ID,
                'typeId' => static::TYPE_ID,
                'value' => static::VALUE,
                'currency' => static::CURRENCY,
                'addressTypeId' => static::ADDRESS_TYPE_ID,
                'locationId' => static::LOCATION_ID,
                'streetUA' => static::STREET_UA,
                'streetRU' => static::STREET_RU,
                'streetEN' => static::STREET_EN,
                'postalCode' => static::POSTAL_CODE,
                'identificationTypeId' => static::IDENTIFICATION_TYPE_ID,
                'number' => static::NUMBER,
                'registrationDate' => Carbon::parse(static::REGISTRATION_DATE),
                'issueDate' => Carbon::parse(static::ISSUE_DATE),
                'expirationDate' => Carbon::parse(static::EXPIRATION_DATE),
                'authorityUA' => static::AUTHORITY_UA,
                'authorityRU' => static::AUTHORITY_RU,
                'authorityEN' => static::AUTHORITY_EN,
            ],
            $this->fakeCollateral->jsonSerialize()
        );
    }

    public function testGetAddressTypeId(): void
    {
        $this->assertEquals(static::ADDRESS_TYPE_ID, $this->fakeCollateral->getAddressTypeId());
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
        $this->assertEquals(static::IDENTIFICATION_TYPE_ID, $this->fakeCollateral->getIdentificationTypeId());
    }

    public function testGetStreetRU(): void
    {
        $this->assertEquals(static::STREET_RU, $this->fakeCollateral->getStreetRU());
    }

    public function testGetAuthorityEN(): void
    {
        $this->assertEquals(static::AUTHORITY_EN, $this->fakeCollateral->getAuthorityEN());
    }

    public function testGetStreetEN(): void
    {
        $this->assertEquals(static::STREET_EN, $this->fakeCollateral->getStreetEN());
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

    public function testGetAuthorityRU(): void
    {
        $this->assertEquals(static::AUTHORITY_RU, $this->fakeCollateral->getAuthorityRU());
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(static::TYPE_ID, $this->fakeCollateral->getTypeId());
    }

    public function testGetAuthorityUA(): void
    {
        $this->assertEquals(static::AUTHORITY_UA, $this->fakeCollateral->getAuthorityUA());
    }

    public function testGetCurrency(): void
    {
        $this->assertEquals(static::CURRENCY, $this->fakeCollateral->getCurrency());
    }

    public function testGetNumber(): void
    {
        $this->assertEquals(static::NUMBER, $this->fakeCollateral->getNumber());
    }

    public function testGetStreetUA(): void
    {
        $this->assertEquals(static::STREET_UA, $this->fakeCollateral->getStreetUA());
    }
}
