<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Address
 * @package Wearesho\Pvbki\Elements
 */
class Address implements ElementInterface
{
    public const TYPE_ID = 'typeId';
    public const LOCATION_ID = 'locationId';
    public const STREET_UA = 'streetUA';
    public const STREET_RU = 'streetRU';
    public const STREET_EN = 'streetEN';
    public const POSTAL_CODE = 'postalCode';

    /** @var int|null */
    protected $typeId;

    /** @var int|null */
    protected $locationId;

    /** @var string|null */
    protected $streetUa;

    /** @var string|null */
    protected $streetRu;

    /** @var string|null */
    protected $streetEn;

    /** @var string|null */
    protected $postalCode;

    public function __construct(
        ?int $typeId,
        ?int $locationId,
        ?string $streetUa,
        ?string $streetRu,
        ?string $streetEn,
        ?string $postalCode
    ) {
        $this->typeId = $typeId;
        $this->locationId = $locationId;
        $this->streetUa = $streetUa;
        $this->streetRu = $streetRu;
        $this->streetEn = $streetEn;
        $this->postalCode = $postalCode;
    }

    public function jsonSerialize(): array
    {
        return [
            'typeId' => $this->typeId,
            'locationId' => $this->locationId,
            'street' => [
                'ua' => $this->streetUa,
                'ru' => $this->streetRu,
                'en' => $this->streetEn,
            ],
            'postalCode' => $this->postalCode,
        ];
    }

    public static function parameters(): array
    {
        return [
            static::TYPE_ID => ParameterType::INTEGER,
            static::LOCATION_ID => ParameterType::INTEGER,
            static::STREET_UA => ParameterType::STRING,
            static::STREET_RU => ParameterType::STRING,
            static::STREET_EN => ParameterType::STRING,
            static::POSTAL_CODE => ParameterType::STRING,
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

    public function getStreetUa(): ?string
    {
        return $this->streetUa;
    }

    public function getStreetRu(): ?string
    {
        return $this->streetRu;
    }

    public function getStreetEn(): ?string
    {
        return $this->streetEn;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }
}
