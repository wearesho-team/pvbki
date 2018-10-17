<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki\Element;

/**
 * Class Collateral
 * @package Wearesho\Pvbki\Elements
 */
class Collateral extends Element
{
    public const ROOT = 'Collateral';
    public const CONTRACT_ID = 'contractid';
    public const TYPE_ID = 'typeId';
    public const VALUE = 'value';
    public const CURRENCY = 'currency';
    public const LOCATION_ID = 'locationId';
    public const STREET_UA = 'streetUA';
    public const STREET_RU = 'streetRU';
    public const STREET_EN = 'streetEN';
    public const POSTAL_CODE = 'postalCode';
    public const IDENTIFICATION_TYPE_ID = 'identificationTypeId';
    public const NUMBER = 'number';
    public const REGISTRATION_DATE = 'registrationDate';
    public const ISSUE_DATE = 'issueDate';
    public const EXPIRATION_DATE = 'expirationDate';
    public const AUTHORITY_UA = 'authorityUA';
    public const AUTHORITY_RU = 'authorityRU';
    public const AUTHORITY_EN = 'authorityEN';

    /** @var string|null */
    protected $contractId;

    /** @var int|null */
    protected $typeId;

    /** @var float|null */
    protected $value;

    /** @var string|null */
    protected $currency;

    /** @var int|null */
    protected $addressTypeId;

    /** @var int|null */
    protected $locationId;

    /** @var string|null */
    protected $streetUA;

    /** @var string|null */
    protected $streetRU;

    /** @var string|null */
    protected $streetEN;

    /** @var string|null */
    protected $postalCode;

    /** @var int|null */
    protected $identificationTypeId;

    /** @var string|null */
    protected $number;

    /** @var \DateTimeInterface|null */
    protected $registrationDate;

    /** @var \DateTimeInterface|null */
    protected $issueDate;

    /** @var \DateTimeInterface|null */
    protected $expirationDate;

    /** @var string|null */
    protected $authorityUA;

    /** @var string|null */
    protected $authorityRU;

    /** @var string|null */
    protected $authorityEN;

    public function __constRUct(
        ?string $contractId,
        ?int $typeId,
        ?float $value,
        ?string $currency,
        ?int $addressTypeId,
        ?int $locationId,
        ?string $streetUA,
        ?string $streetRU,
        ?string $streetEN,
        ?string $postalCode,
        ?int $identificationTypeId,
        ?string $number,
        ?\DateTimeInterface $registrationDate,
        ?\DateTimeInterface $issueDate,
        ?\DateTimeInterface $expirationDate,
        ?string $authorityUA,
        ?string $authorityRU,
        ?string $authorityEN
    ) {
        $this->contractId = $contractId;
        $this->typeId = $typeId;
        $this->value = $value;
        $this->currency = $currency;
        $this->addressTypeId = $addressTypeId;
        $this->locationId = $locationId;
        $this->streetUA = $streetUA;
        $this->streetRU = $streetRU;
        $this->streetEN = $streetEN;
        $this->postalCode = $postalCode;
        $this->identificationTypeId = $identificationTypeId;
        $this->number = $number;
        $this->registrationDate = $registrationDate;
        $this->issueDate = $issueDate;
        $this->expirationDate = $expirationDate;
        $this->authorityUA = $authorityUA;
        $this->authorityRU = $authorityRU;
        $this->authorityEN = $authorityEN;
    }

    public function getContractId(): ?string
    {
        return $this->contractId;
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function getAddressTypeId(): ?int
    {
        return $this->addressTypeId;
    }

    public function getLocationId(): ?int
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

    public function getIdentificationTypeId(): ?int
    {
        return $this->identificationTypeId;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function getAuthorityUA(): ?string
    {
        return $this->authorityUA;
    }

    public function getAuthorityRU(): ?string
    {
        return $this->authorityRU;
    }

    public function getAuthorityEN(): ?string
    {
        return $this->authorityEN;
    }
}
