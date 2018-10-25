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

    /** @var Pvbki\Enums\AddressType */
    protected $typeId;

    /** @var int */
    protected $locationId;

    /** @var Pvbki\Sentence\Translation */
    protected $street;

    /** @var string|null */
    protected $postalCode;

    public function __construct(
        int $locationId,
        Pvbki\Enums\AddressType $typeId,
        Pvbki\Sentence\Translation $street,
        ?string $postalCode
    ) {
        $this->typeId = $typeId;
        $this->locationId = $locationId;
        $this->street = $street;
        $this->postalCode = $postalCode;
    }

    public function getTypeId(): Pvbki\Enums\AddressType
    {
        return $this->typeId;
    }

    public function getLocationId(): int
    {
        return $this->locationId;
    }

    public function getStreet(): Pvbki\Sentence\Translation
    {
        return $this->street;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }
}
