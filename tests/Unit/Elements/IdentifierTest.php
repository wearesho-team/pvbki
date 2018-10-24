<?php

namespace Wearesho\Pvbki\Tests\Unit\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki;

/**
 * Class IdentifierTest
 * @package Wearesho\Pvbki\Tests\Unit\Elements
 * @coversDefaultClass \Wearesho\Pvbki\Elements\Identifier
 * @internal
 */
class IdentifierTest extends TestCase
{
    protected const NUMBER = 'number';
    protected const REGISTRATION_DATE = '2017-03-12';
    protected const EXPIRATION_DATE = '2020-03-12';
    protected const AUTHORITY_UA = 'authority_ua';
    protected const AUTHORITY_RU = 'authority_ru';
    protected const AUTHORITY_EN = 'authority_en';

    /** @var Pvbki\Elements\Identifier */
    protected $fakeIdentifier;

    protected function setUp(): void
    {
        $this->fakeIdentifier = new Pvbki\Elements\Identifier(
            Pvbki\Enums\IdentificationType::PASSPORT(),
            static::NUMBER,
            Carbon::parse(static::REGISTRATION_DATE),
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
                'typeId' => Pvbki\Enums\IdentificationType::PASSPORT(),
                'number' => static::NUMBER,
                'registrationDate' => Carbon::parse(static::REGISTRATION_DATE),
                'expirationDate' => Carbon::parse(static::EXPIRATION_DATE),
                'authority' => new Pvbki\Sentence\Translation(
                    static::AUTHORITY_UA,
                    static::AUTHORITY_RU,
                    static::AUTHORITY_EN
                ),
            ],
            $this->fakeIdentifier->jsonSerialize()
        );
    }

    public function testGetNumber(): void
    {
        $this->assertEquals(static::NUMBER, $this->fakeIdentifier->getNumber());
    }

    public function testGetRegistrationDate(): void
    {
        $this->assertEquals(
            static::REGISTRATION_DATE,
            Carbon::make($this->fakeIdentifier->getRegistrationDate())->toDateString()
        );
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals(Pvbki\Enums\IdentificationType::PASSPORT(), $this->fakeIdentifier->getTypeId());
    }

    public function testGetAuthority(): void
    {
        $this->assertEquals(
            new Pvbki\Sentence\Translation(
                static::AUTHORITY_UA,
                static::AUTHORITY_RU,
                static::AUTHORITY_EN
            ),
            $this->fakeIdentifier->getAuthority()
        );
    }

    public function testGetExpirationDate(): void
    {
        $this->assertEquals(
            static::EXPIRATION_DATE,
            Carbon::make($this->fakeIdentifier->getExpirationDate())->toDateString()
        );
    }
}
