<?php

namespace Wearesho\Pvbki\Elements;

use Carbon\Carbon;
use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Collateral
 * @package Wearesho\Pvbki\Elements
 */
class Collateral implements ElementInterface
{
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
    protected $streetUa;

    /** @var string|null */
    protected $streetRu;

    /** @var string|null */
    protected $streetEn;

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
    protected $authorityUa;

    /** @var string|null */
    protected $authorityRu;

    /** @var string|null */
    protected $authorityEn;

    public function __construct(
        ?string $contractId,
        ?int $typeId,
        ?float $value,
        ?string $currency,
        ?int $addressTypeId,
        ?int $locationId,
        ?string $streetUa,
        ?string $streetRu,
        ?string $streetEn,
        ?string $postalCode,
        ?int $identificationTypeId,
        ?string $number,
        ?\DateTimeInterface $registrationDate,
        ?\DateTimeInterface $issueDate,
        ?\DateTimeInterface $expirationDate,
        ?string $authorityUa,
        ?string $authorityRu,
        ?string $authorityEn
    ) {
        $this->contractId = $contractId;
        $this->typeId = $typeId;
        $this->value = $value;
        $this->currency = $currency;
        $this->addressTypeId = $addressTypeId;
        $this->locationId = $locationId;
        $this->streetUa = $streetUa;
        $this->streetRu = $streetRu;
        $this->streetEn = $streetEn;
        $this->postalCode = $postalCode;
        $this->identificationTypeId = $identificationTypeId;
        $this->number = $number;
        $this->registrationDate = $registrationDate;
        $this->issueDate = $issueDate;
        $this->expirationDate = $expirationDate;
        $this->authorityUa = $authorityUa;
        $this->authorityRu = $authorityRu;
        $this->authorityEn = $authorityEn;
    }

    public function jsonSerialize(): array
    {
        return [
            static::CONTRACT_ID => $this->contractId,
            static::TYPE_ID => $this->typeId,
            static::VALUE => $this->value,
            static::CURRENCY => $this->currency,
            static::LOCATION_ID => $this->locationId,
            'street' => [
                'ua' => $this->streetUa,
                'ru' => $this->streetRu,
                'en' => $this->streetEn
            ],
            static::POSTAL_CODE => $this->postalCode,
            static::IDENTIFICATION_TYPE_ID => $this->identificationTypeId,
            static::NUMBER => $this->number,
            static::REGISTRATION_DATE => Carbon::make($this->registrationDate),
            static::ISSUE_DATE => Carbon::make($this->issueDate),
            static::EXPIRATION_DATE => Carbon::make($this->expirationDate),
            'authority' => [
                'ua' => $this->authorityUa,
                'ru' => $this->authorityRu,
                'en' => $this->authorityEn
            ]
        ];
    }

    public static function parameters(): array
    {
        return [
            static::CONTRACT_ID => ParameterType::STRING,
            static::TYPE_ID => ParameterType::INTEGER,
            static::VALUE => ParameterType::DOUBLE,
            static::CURRENCY => ParameterType::STRING,
            static::LOCATION_ID => ParameterType::INTEGER,
            static::STREET_UA => ParameterType::STRING,
            static::STREET_RU => ParameterType::STRING,
            static::STREET_EN => ParameterType::STRING,
            static::POSTAL_CODE => ParameterType::STRING,
            static::IDENTIFICATION_TYPE_ID => ParameterType::INTEGER,
            static::NUMBER => ParameterType::STRING,
            static::REGISTRATION_DATE => ParameterType::DATE,
            static::ISSUE_DATE => ParameterType::DATE,
            static::EXPIRATION_DATE => ParameterType::DATE,
            static::AUTHORITY_UA => ParameterType::STRING,
            static::AUTHORITY_RU => ParameterType::STRING,
            static::AUTHORITY_EN=> ParameterType::STRING,
        ];
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

    public function getAuthorityUa(): ?string
    {
        return $this->authorityUa;
    }

    public function getAuthorityRu(): ?string
    {
        return $this->authorityRu;
    }

    public function getAuthorityEn(): ?string
    {
        return $this->authorityEn;
    }
}
