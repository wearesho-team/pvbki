<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class Address
 * @package Wearesho\Pvbki\Elements
 */
class Address extends Pvbki\Infrastructure\Element
{
    public const ROOT = 'Address';
    public const TYPE_ID = 'typeId';
    public const LOCATION_ID = 'locationId';
    public const STREET = 'street';
    public const STREET_UA = 'streetUA';
    public const STREET_RU = 'streetRU';
    public const STREET_EN = 'streetEN';
    public const POSTAL_CODE = 'postalCode';

    /** @var int|null */
    protected $typeId;

    /** @var int */
    protected $locationId;

    /** @var Pvbki\Sentence\Translation|null */
    protected $street;

    /** @var string|null */
    protected $postalCode;

    public function __construct(
        int $locationId,
        ?int $typeId,
        ?Pvbki\Sentence\Translation $street,
        ?string $postalCode
    ) {
        $this->typeId = $typeId;
        $this->locationId = $locationId;
        $this->street = $street;
        $this->postalCode = $postalCode;
    }

    public static function arguments(): Pvbki\Collections\RuleCollection
    {
        return new Pvbki\Collections\RuleCollection([
            new Pvbki\Rule(Pvbki\Enums\RuleType::INT(), static::LOCATION_ID),
            new Pvbki\Rule(Pvbki\Enums\RuleType::INT(), static::TYPE_ID),
            new Pvbki\Rule(Pvbki\Enums\RuleType::TRANSLATE(), static::STREET_UA, static::STREET_RU, static::STREET_EN),
            new Pvbki\Rule(Pvbki\Enums\RuleType::STRING(), static::POSTAL_CODE),
        ]);
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getLocationId(): int
    {
        return $this->locationId;
    }

    public function getStreet(): ?Pvbki\Sentence\Translation
    {
        return $this->street;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }
}
