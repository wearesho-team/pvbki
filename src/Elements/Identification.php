<?php

namespace Wearesho\Pvbki\Elements;

use Carbon\Carbon;
use Wearesho\Pvbki\ElementInterface;
use Wearesho\Pvbki\ParameterType;

/**
 * Class Identification
 * @package Wearesho\Pvbki\Elements
 */
class Identification implements ElementInterface
{
    public const TYPE_ID = 'typeId';
    public const NUMBER = 'number';
    public const REGISTRATION_DATE = 'registrationDate';
    public const ISSUE_DATE = 'issueDate';
    public const EXPIRATION_DATE = 'expirationDate';
    public const ISSUED_BY_UA = 'authorityUA';
    public const ISSUED_BY_RU = 'authorityRU';
    public const ISSUED_BY_EN = 'authorityEN';

    /** @var int|null */
    protected $typeId;

    /** @var string|null */
    protected $number;

    /** @var \DateTimeInterface|null */
    protected $registrationDate;

    /** @var \DateTimeInterface|null */
    protected $expirationDate;

    /** @var string|null */
    protected $issuedByUa;

    /** @var string|null */
    protected $issuedByRu;

    /** @var string|null */
    protected $issuedByEn;

    public function __construct(
        ?int $typeId,
        ?string $number,
        ?\DateTimeInterface $registrationDate,
        ?\DateTimeInterface $expirationDate,
        ?string $issuedByUa,
        ?string $issuedByRu,
        ?string $issuedByEn
    ) {
        $this->typeId = $typeId;
        $this->number = $number;
        $this->registrationDate = $registrationDate;
        $this->expirationDate = $expirationDate;
        $this->issuedByUa = $issuedByUa;
        $this->issuedByRu = $issuedByRu;
        $this->issuedByEn = $issuedByEn;
    }

    public function jsonSerialize(): array
    {
        return [
            'typeId' => $this->typeId,
            'number' => $this->number,
            'registrationDate' => Carbon::make($this->registrationDate),
            'expirationDate' => Carbon::make($this->expirationDate),
            'issuedBy' => [
                'ua' => $this->issuedByUa,
                'ru' => $this->issuedByRu,
                'en' => $this->issuedByEn
            ],
        ];
    }

    public static function parameters(): array
    {
        return [
            static::TYPE_ID => ParameterType::INTEGER,
            static::NUMBER => ParameterType::STRING,
            static::REGISTRATION_DATE => ParameterType::DATE,
            static::EXPIRATION_DATE => ParameterType::DATE,
            static::ISSUED_BY_UA => ParameterType::STRING,
            static::ISSUED_BY_RU => ParameterType::STRING,
            static::ISSUED_BY_EN => ParameterType::STRING,
        ];
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function getIssuedByUa(): ?string
    {
        return $this->issuedByUa;
    }

    public function getIssuedByRu(): ?string
    {
        return $this->issuedByRu;
    }

    public function getIssuedByEn(): ?string
    {
        return $this->issuedByEn;
    }
}
