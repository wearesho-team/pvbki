<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Infrastructure\Element;

/**
 * Class Address
 * @package Wearesho\Pvbki\Elements
 */
class Address extends Element
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

    /** @var string|null */
    protected $streetUA;

    /** @var string|null */
    protected $streetRU;

    /** @var string|null */
    protected $streetEN;

    /** @var string|null */
    protected $streetUa;

    /** @var string|null */
    protected $streetRu;

    /** @var string|null */
    protected $streetEn;

    /** @var string|null */
    protected $postalCode;

    public function __construct(
        int $locationId,
        ?int $typeId,
        ?string $streetUA,
        ?string $streetRU,
        ?string $streetEN,
        ?string $postalCode
    ) {
        $this->typeId = $typeId;
        $this->locationId = $locationId;
        $this->streetUA = $streetUA;
        $this->streetRU = $streetRU;
        $this->streetEN = $streetEN;
        $this->postalCode = $postalCode;
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getLocationId(): int
    {
        return $this->locationId;
    }

    public function getStreetUA(): ?string
    {
        return $this->streetUA;
    }

    public function getStreetRU(): ?string
    {
        return $this->streetRU;
    }

    public function getStreetEN(): ?string
    {
        return $this->streetEN;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }
}
