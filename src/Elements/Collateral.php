<?php

namespace Wearesho\Pvbki\Elements;

use Wearesho\Pvbki;

/**
 * Class Collateral
 * @package Wearesho\Pvbki\Elements
 */
class Collateral extends Pvbki\Infrastructure\Element
{
    public const ROOT = 'Collateral';
    public const CONTRACT_ID = 'contractid';
    public const TYPE_ID = 'typeId';
    public const VALUE = 'value';
    public const CURRENCY = 'currency';
    public const ADDRESS_TYPE_ID = 'address-typeId';
    public const LOCATION_ID = 'locationId';
    public const STREET_UA = 'streetUA';
    public const STREET_RU = 'streetRU';
    public const STREET_EN = 'streetEN';
    public const POSTAL_CODE = 'postalCode';
    public const IDENTIFICATION_TYPE_ID = 'identification-typeId';
    public const NUMBER = 'number';
    public const REGISTRATION_DATE = 'registrationDate';
    public const ISSUE_DATE = 'issueDate';
    public const EXPIRATION_DATE = 'expirationDate';
    public const AUTHORITY_UA = 'authorityUA';
    public const AUTHORITY_RU = 'authorityRU';
    public const AUTHORITY_EN = 'authorityEN';

    /** @var string|null */
    protected $contractId;

    /** @var Pvbki\Enums\CollateralType */
    protected $typeId;

    /** @var float|null */
    protected $value;

    /** @var string|null */
    protected $currency;

    /** @var Pvbki\Enums\AddressType */
    protected $addressTypeId;

    /** @var int|null */
    protected $locationId;

    /** @var Pvbki\Sentence\Translation */
    protected $street;

    /** @var string|null */
    protected $postalCode;

    /** @var Pvbki\Enums\IdentificationType */
    protected $identificationTypeId;

    /** @var string|null */
    protected $number;

    /** @var \DateTimeInterface|null */
    protected $registrationDate;

    /** @var \DateTimeInterface|null */
    protected $issueDate;

    /** @var \DateTimeInterface|null */
    protected $expirationDate;

    /** @var Pvbki\Sentence\Translation */
    protected $authority;

    public function __construct(
        ?string $contractId,
        Pvbki\Enums\CollateralType $typeId,
        ?float $value,
        ?string $currency,
        Pvbki\Enums\AddressType $addressTypeId,
        ?int $locationId,
        Pvbki\Sentence\Translation $street,
        ?string $postalCode,
        Pvbki\Enums\IdentificationType $identificationTypeId,
        ?string $number,
        ?\DateTimeInterface $registrationDate,
        ?\DateTimeInterface $issueDate,
        ?\DateTimeInterface $expirationDate,
        Pvbki\Sentence\Translation $authority
    ) {
        $this->contractId = $contractId;
        $this->typeId = $typeId;
        $this->value = $value;
        $this->currency = $currency;
        $this->addressTypeId = $addressTypeId;
        $this->locationId = $locationId;
        $this->street = $street;
        $this->postalCode = $postalCode;
        $this->identificationTypeId = $identificationTypeId;
        $this->number = $number;
        $this->registrationDate = $registrationDate;
        $this->issueDate = $issueDate;
        $this->expirationDate = $expirationDate;
        $this->authority = $authority;
    }

    public function getContractId(): ?string
    {
        return $this->contractId;
    }

    public function getTypeId(): Pvbki\Enums\CollateralType
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

    public function getAddressTypeId(): Pvbki\Enums\AddressType
    {
        return $this->addressTypeId;
    }

    public function getLocationId(): ?int
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

    public function getIdentificationTypeId(): Pvbki\Enums\IdentificationType
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

    public function getAuthority(): ?Pvbki\Sentence\Translation
    {
        return $this->authority;
    }
}
