<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Element;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Address
 * @package Wearesho\Pvbki\Elements
 */
class Address extends Element
{
    public const TYPE_ID = 'typeId';
    public const LOCATION_ID = 'locationId';
    public const STREET = 'street';
    public const STREET_UA = 'streetUA';
    public const STREET_RU = 'streetRU';
    public const STREET_EN = 'streetEN';
    public const POSTAL_CODE = 'postalCode';

    /** @var int|null */
    protected $typeId;

    /** @var int|null */
    protected $locationId;

    /** @var Translator */
    protected $street;

    /** @var string|null */
    protected $streetUa;

    /** @var string|null */
    protected $streetRu;

    /** @var string|null */
    protected $streetEn;

    /** @var string|null */
    protected $postalCode;

    public function jsonSerialize(): array
    {
        return [
            static::TYPE_ID => $this->typeId,
            static::LOCATION_ID => $this->locationId,
            static::STREET => $this->street,
            static::POSTAL_CODE => $this->postalCode,
        ];
    }

    public static function parameters(): array
    {
        return [
            static::TYPE_ID => ParameterType::INTEGER,
            static::LOCATION_ID => ParameterType::INTEGER,
            static::STREET => Translator::class,
            static::POSTAL_CODE => ParameterType::STRING,
        ];
    }

    public static function translators(): array
    {
        return [
            static::STREET => [
                Translator::UA => static::STREET_UA,
                Translator::RU => static::STREET_RU,
                Translator::EN => static::STREET_EN,
            ]
        ];
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getLocationId(): ?int
    {
        return $this->locationId;
    }

    public function getStreet(): Translator
    {
        return $this->street;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }
}
